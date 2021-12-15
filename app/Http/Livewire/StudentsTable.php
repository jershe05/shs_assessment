<?php

namespace App\Http\Livewire;

use App\Domains\Applicant\Models\Applicant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class StudentsTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make(__('Name'))
                ->searchable(function($builder, $term){
                    return $builder->select(DB::raw("CONCAT(first_name, ' ', middle_name, ' ', last_name) as name"),
                    'phone',
                    'address',
                    'email',
                    'school');
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
        $query = Applicant::query()
            ->select(DB::raw("CONCAT(first_name, ' ', middle_name, ' ', last_name) as name"),
            'phone',
            'address',
            'email',
            'school'
        );
        return $query->when($this->getFilter('search'), fn ($query, $term) =>
        $query->where(DB::raw("CONCAT(first_name, ' ', middle_name, ' ', last_name)"), 'like', "%$term%"))->distinct();;
    }
}
