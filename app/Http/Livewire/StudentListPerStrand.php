<?php

namespace App\Http\Livewire;

use App\Domains\Applicant\Models\Applicant;
use App\Domains\Result\Models\SuggestedStrand;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
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
            Column::make(__('Name'))
                ->sortable()
                ->searchable(function($builder, $term) {
                    return $builder->join('applicants', 'applicants.id', 'suggested_strand.applicant_id')
                    ->where('last_name', 'like', "%$term%")->select(DB::raw("CONCAT(first_name, ' ', middle_name, ' ', last_name) as name"),
                    'phone',
                    'address',
                    'email',
                    'school'
                )->distinct();
                }),
            Column::make(__('Address'))
                ->sortable(),
            Column::make(__('Phone'))
                ->sortable(),

            Column::make(__('Email'))
                ->sortable(),
            Column::make(__('School'))
                ->sortable(),
        ];

    }

    public function query(): Builder
    {
        $query = SuggestedStrand::join('applicants', 'applicants.id', 'suggested_strand.applicant_id')
            ->where('strand_id', Session('strand'))
            ->select(DB::raw("CONCAT(first_name, ' ', middle_name, ' ', last_name) as name"),
                'phone',
                'address',
                'email',
                'school'
            )->distinct();
        return $query->when($this->getFilter('search'), fn ($query, $term) =>
            $query->where(DB::raw("CONCAT(first_name, ' ', middle_name, ' ', last_name)"), 'like', "%$term%"));
    }

}
