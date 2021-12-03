<?php

namespace App\Http\Livewire;

use App\Domains\Tracks\Models\Strand;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use App\Domains\Tracks\Models\Track;
use Rappasoft\LaravelLivewireTables\Views\Column;
class TracksTable extends DataTableComponent
{

    public function query(): Builder
    {
        return Strand::query();
        // return Role::with('permissions:id,name,description')
        //     ->withCount('users')
        //     ->when($this->getFilter('search'), fn ($query, $term) => $query->search($term));
    }

    public function columns(): array
    {
        return [

            Column::make(__('Name'))
                ->sortable()
                ->searchable(),
            Column::make(__('Track'))
                ->sortable()
                ->searchable(),
            Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'tracks.includes.row';
    }
}
