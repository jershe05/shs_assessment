
<x-livewire-tables::bs4.table.cell>
    {{ $row->id }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->title }}
    <ul class="list-group">
        @foreach ($row->answers as $answer)
            <li class="list-group-item d-flex justify-content-between align-items-center">
             {{ $answer->answer }}
             @if($answer->correct)
             <span class="badge badge-primary badge-pill">Correct Answer</span>
             @endif
          </li>
        @endforeach
      </ul>
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    @include('tracks.includes.question-action', ['model' => $row])
</x-livewire-tables::bs4.table.cell>
