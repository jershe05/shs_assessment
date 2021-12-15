<?php

namespace App\Http\Livewire;

use App\Domains\Question\Models\Question;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Session;

class QuestionTable extends DataTableComponent
{
    public $strandId;
    public array $perPageAccepted = [1, 2, 3];
    public function mount($strandId)
    {
        $this->strandId = $strandId;
        Session::put('id', $strandId);
    }

    public function columns(): array
    {
        return [

            Column::make(__('ID'))
                ->sortable(),
            Column::make(__('Questions'))
                ->sortable(),
            Column::make(__('Actions')),
        ];
    }

    public function query(): Builder
    {
        $query = Question::where('track_id', Session::get('id'))->orderBy('id', 'Desc');
        return $query;
    }
    public function rowView(): string
    {
        return 'tracks.includes.question-row';
    }
}
