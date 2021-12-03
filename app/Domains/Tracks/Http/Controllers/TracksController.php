<?php
namespace App\Domains\Tracks\Http\Controllers;

use App\Domains\Question\Models\Answer;
use App\Domains\Question\Models\Question;
use App\Domains\Tracks\Models\Strand;

class TracksController
{
    public function index()
    {
        return view('tracks.index');
    }

    public function update(Strand $strand)
    {
        return view('tracks.update')
            ->with('strand', $strand);
    }

    public function show(Strand $strand)
    {
        return view('tracks.show')
            ->with('strand', $strand);
    }

    public function editQuestion(Question $question)
    {
        $answers = Answer::where('question_id', $question->id)->first();

        return view('tracks.edit-question')
            ->with('question', $question)
            ->with('strandId', $question->track_id);
    }

    public function deleteQuestion(Question $question)
    {
        $strand = $question->track_id;
        foreach($question->answers as $answer)
        {
            $answer->delete();
        }

        $question->delete();
        return redirect()->route('admin.strand.show', ['strand' => $strand]);
    }
}
