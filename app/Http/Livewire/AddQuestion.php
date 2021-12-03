<?php

namespace App\Http\Livewire;

use App\Domains\Question\Models\Answer;
use App\Domains\Question\Models\Question;
use Doctrine\DBAL\Query;
use Livewire\Component;

class AddQuestion extends Component
{
    public $question;
    public $option1;
    public $option2;
    public $option3;
    public $option4;

    public $isOption1Correct = false;
    public $isOption2Correct = false;
    public $isOption3Correct = false;
    public $isOption4Correct = false;

    public $strandId;
    public $message;
    public $rules = [
        'option1' => 'required',
        'option2' => 'required',
        'option3' => 'required',
        'option4' => 'required',
    ];

    public $isEdit;
    public $questionObject;
    public $option1Object;
    public $option2Object;
    public $option3Object;
    public $option4Object;
    public function mount($strandId, $questionId = null, $isEdit = false)
    {
        $this->strandId = $strandId;
        $this->isEdit = $isEdit;

        if($isEdit)
        {
            $question = Question::where('id', $questionId)->first();
            $this->questionObject = $question;
            $this->question = $question->title;
            $answers = Answer::where('question_id', $questionId)->get();
            $options = [];
            foreach($answers as $key => $answer)
            {
                $options[$key] = $answer;
            }
            $this->option1 = $options[0]->answer;
            $this->isOption1Correct = $options[0]->correct;
            $this->option1Object = $options[0];

            $this->option2 = $options[1]->answer;
            $this->isOption2Correct = $options[1]->correct;
            $this->option2Object = $options[1];

            $this->option3 = $options[2]->answer;
            $this->isOption3Correct = $options[2]->correct;
            $this->option3Object = $options[2];

            $this->option4 = $options[3]->answer;
            $this->isOption4Correct = $options[3]->correct;
            $this->option4Object = $options[3];
        }

    }

    public function add()
    {

        $this->validate();
        if($this->isEdit)
        {
            $this->questionObject->title = $this->question;
            $this->questionObject->save();
            $this->questionObject->refresh();

            $this->option1Object->answer = $this->option1;
            $this->option1Object->correct = $this->isOption1Correct;
            $this->option1Object->save();
            $this->option1Object->refresh();

            $this->option2Object->answer = $this->option2;
            $this->option2Object->correct = $this->isOption2Correct;
            $this->option2Object->save();
            $this->option2Object->refresh();

            $this->option3Object->answer = $this->option3;
            $this->option3Object->correct = $this->isOption3Correct;
            $this->option3Object->save();
            $this->option3Object->refresh();

            $this->option4Object->answer = $this->option4;
            $this->option4Object->correct = $this->isOption4Correct;
            $this->option4Object->save();
            $this->option4Object->refresh();

            return;

        }

        $questionCount = Question::where('track_id', $this->strandId)->get()->count();
        if($questionCount >= 20)
        {
            $this->message = "Questions count for this strand is already 20, please delete or edit other questins on the list.";
            return;
        }

        $question = Question::create([
            'title' => $this->question,
            'track_id' => $this->strandId,
        ]);

        Answer::create([
            'question_id' => $question->id,
            'answer' => $this->option1,
            'correct' => $this->isOption1Correct
        ]);

        Answer::create([
            'question_id' => $question->id,
            'answer' => $this->option2,
            'correct' => $this->isOption2Correct
        ]);

        Answer::create([
            'question_id' => $question->id,
            'answer' => $this->option3,
            'correct' => $this->isOption3Correct
        ]);

        Answer::create([
            'question_id' => $question->id,
            'answer' => $this->option4,
            'correct' => $this->isOption4Correct
        ]);

        $this->message = "successfully added.";

        $this->option1 = null;
        $this->option2 = null;
        $this->option3 = null;
        $this->option4 = null;

        $this->isOption1Correct = false;
        $this->isOption2Correct = false;
        $this->isOption3Correct = false;
        $this->isOption4Correct = false;
    }

    public function render()
    {
        return view('livewire.add-question');
    }
}
