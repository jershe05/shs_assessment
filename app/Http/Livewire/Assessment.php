<?php

namespace App\Http\Livewire;

use App\Domains\Applicant\Models\Applicant;
use App\Domains\Question\Models\Answer;
use App\Domains\Question\Models\Question;
use App\Domains\Question\Models\Result;
use App\Domains\Result\Models\ApplicantResultPerStrand;
use App\Domains\Result\Models\SuggestedStrand;
use App\Domains\Tracks\Models\Strand;
use Livewire\Component;

class Assessment extends Component
{
    public $questions;
    public $questionIndex = 0;
    public $strands;
    public $question;
    public $strand;
    public $options;
    public $answer;
    public $applicant;
    public $finish;
    public $score;
    public $rules = [
        'answer' => 'required'
    ];

    public function mount(Applicant $applicant)
    {
        $this->applicant = $applicant;
        $this->questions = Question::all()->toArray();
        $this->strands = Strand::all();
        $this->question = $this->questions[$this->questionIndex];
        $this->options = Answer::where('question_id', $this->questions[$this->questionIndex]['id'])->get();
        $this->strand = $this->strands->where('id', $this->question['track_id'])->first();

        if($applicant->status !== null)
        {
            $this->finish = true;
            $this->showResult();
        }

    }

    public function submitAnswer()
    {

        $this->validate();
        $result = $this->options->where('id', $this->answer)->first();
        Result::create([
            'question_id' => $this->question['id'],
            'answer' => $this->answer,
            'result' => $result->correct,
            'applicant_id' => $this->applicant->id
        ]);

        $this->questionIndex += 1;

        if(count($this->questions) === $this->questionIndex)
        {
            $this->finish = true;
            $this->applicant->status = 1;
            $this->applicant->save();
            $this->showResult();
            return;
        }


        $this->question = $this->questions[$this->questionIndex];
        $this->options = Answer::where('question_id', $this->questions[$this->questionIndex]['id'])->get();
        $this->strand = $this->strands->where('id', $this->question['track_id'])->first();
    }

    public function showResult()
    {
        $total = 0;
        $score = 0;
        $percentage = 0;

        foreach($this->strands as $strand)
        {
            foreach($strand->question as $question)
            {
                $score = $score + $question->results
                    ->where('applicant_id', $this->applicant->id)
                    ->first()->result;
            }

            $this->score[$strand->id] = $score;
            $this->saveResult($strand, $score);
            $score = 0;
        }

        $suggestedStrand = $this->applicant->applicantResult->where('result', $this->applicant->applicantResult->max('result'));
        SuggestedStrand::updateOrCreate([
            'applicant_id' => $this->applicant->id,
            'strand_id' =>  $suggestedStrand->first()->strand_id
        ]);
    }

    public function saveResult($strand, $score)
    {
        $questionCount = count($strand->question);
        if($score)
            $percentage = number_format($score / $questionCount * 100, 2);
        else
            $percentage = 0;

        ApplicantResultPerStrand::updateOrCreate([
            'applicant_id' => $this->applicant->id,
            'strand_id' => $strand->id,
            'result' => $percentage
        ]);
    }

    public function render()
    {
        return view('livewire.assessment');
    }
}
