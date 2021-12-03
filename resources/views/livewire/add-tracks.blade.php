<div>
    <div div wire:ignore.self class="modal fade" id="addTrack" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel">Add Strand</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                @if($error)
                    <div class="alert alert-danger" role="alert">
                        {{ $errorMessage }}
                    </div>
                @endif
                <x-forms.post  class="user">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" wire:model="name"
                        value="{{ old('name') }}" placeholder="{{ __('Name') }}" maxlength="100" required autofocus autocomplete="name">
                    </div>
                    <div class="form-group">
                        <div class="dropdown no-arrow mb-4 w-50">
                            <label>Select Track</label>
                            <button class="btn btn-danger dropdown-toggle w-100 text-left" type="button"
                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                {{ $track }} <span class="caret"></span></button>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" wire:click="selectTrack('Academic')" href="#">Academic</a>
                                <a class="dropdown-item" wire:click="selectTrack('TVL')" href="#">Technical-Vocational-Livelihood (TVL)</a>
                                <a class="dropdown-item" wire:click="selectTrack('Sports')" href="#">Sports</a>
                                <a class="dropdown-item" wire:click="selectTrack('Arts and Design')" href="#">Arts and Design</a>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-user btn-block" wire:click="add" type="button">@lang('Add')</button>
                    <hr>
                </x-forms.post>
            </div>

          </div>
        </div>
      </div>
</div>
