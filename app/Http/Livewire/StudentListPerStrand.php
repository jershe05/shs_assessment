<?php

namespace App\Http\Livewire;

use App\Domains\Applicant\Models\Applicant;
use App\Domains\Result\Models\SuggestedStrand;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Session;

class StudentListPerStrand extends DataTableComponent
{

    public function mount($strand)
    {
        session(['strand' => $strand]);
    }
    public function columns(): array
    {
        return [
            Column::make(__('First Name'))
                ->sortable()
                ->searchable(),
            Column::make(__('Middle Name'))
                ->sortable()
                ->searchable(),
            Column::make(__('Last Name'))
                ->sortable()
                ->searchable(),
            Column::make(__('Address'))
                ->sortable()
                ->searchable(),
            Column::make(__('Phone'))
                ->sortable()
                ->searchable(),
            Column::make(__('Email'))
                ->sortable()
                ->searchable(),
            Column::make(__('School'))
                ->sortable()
                ->searchable(),
            Column::make(__('Actions')),
        ];

    }

    public function query(): Builder
    {
        $query = SuggestedStrand::where('strand_id', Session('strand'));
        return $query;
    }

    public function rowView(): string
    {
        return 'tracks.includes.applicant-row';
    }
}
