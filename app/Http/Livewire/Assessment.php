<?php

namespace App\Http\Livewire;

use App\Domains\Applicant\Models\Applicant;
use App\Domains\Question\Models\Answer;
use App\Domains\Question\Models\Question;
use App\Domains\Question\Models\Result;
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
            return;
        }


        $this->question = $this->questions[$this->questionIndex];
        $this->options = Answer::where('question_id', $this->questions[$this->questionIndex]['id'])->get();
        $this->strand = $this->strands->where('id', $this->question['track_id'])->first();
    }

    public function render()
    {
        return view('livewire.assessment');
    }
}
