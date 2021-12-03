<?php

namespace App\Http\Livewire;

use App\Domains\Tracks\Http\Controllers\TracksController;
use App\Domains\Tracks\Models\Strand;
use Livewire\Component;

class AddTracks extends Component
{
    public $error;
    public $errorMessage;
    public $name;
    public $track = 'Choose...';

    public function selectTrack($track)
    {
        $this->track = $track;
    }
    public function add()
    {

        $strand = Strand::where('name', $this->name)
            ->where('track', $this->track)->count();
        if($strand)
        {
            $this->error = true;
            $this->errorMessage = $this->name . ' Already existing';
            return;
        }

        Strand::create([
            'name' => $this->name,
            'track' => $this->track
        ]);

        return redirect()->route('admin.tracks');
    }

    public function render()
    {
        return view('livewire.add-tracks');
    }


}
