<?php

namespace App\Http\Livewire;

use App\Domains\Tracks\Models\Strand;
use Livewire\Component;

class EditStrand extends Component
{
    public $error;
    public $errorMessage;
    public $name;
    public $track = 'Choose...';
    public $strandId;
    public $strand;

    public function mount(Strand $strand)
    {
        $this->strand = $strand;
        $this->name = $strand->name;
        $this->track = $strand->track;

    }

    public function selectTrack($track)
    {
        $this->track = $track;
    }

    public function update()
    {

        $strand = Strand::where('name', $this->name)
            ->where('track', $this->track)->count();
        if($strand)
        {
            $this->error = true;
            $this->errorMessage = $this->name . ' Already existing';
            return;
        }

        $this->strand->name = $this->name;
        $this->strand->track = $this->track;
        $this->strand->save();

        return redirect()->route('admin.tracks');
    }
    public function render()
    {
        return view('livewire.edit-strand');
    }
}
