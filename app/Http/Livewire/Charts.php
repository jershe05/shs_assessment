<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Charts extends Component
{
    public function mount()
    {
        $this->loadPie();
    }

    public function loadPie()
    {
        $this->emit('test');
        $this->emit('pie', [
            'elementId' => 'pie',
            'labels' => ['TVL', 'Academic'],
            'percentage' => 90,
            'colors' => ['rgb(122,22, 1)', 'rgb(12, 2, 3)'],
            'type' => 'pie',
            'label' => 'try'
        ]);
    }
    public function render()
    {
        return view('livewire.charts');
    }
}
