<div>

                <x-forms.post  class="user">
                    <div class="form-group">
                        <input type="text" id="strandName" class="form-control form-control-user" wire:model="name"
                        value="{{ old('name') }}" placeholder="{{ __('Name') }}" maxlength="100" required autofocus autocomplete="name">
                    </div>
                    <input type="hidden" wire:model="strandId" id="strandId" value=""/>
                    <input type="hidden" wire:model="name"  value=""/>
                    <div class="form-group">
                        <div class="dropdown no-arrow mb-4 w-50">
                            <label>Select Track</label>
                            <button class="btn btn-danger dropdown-toggle w-100 text-left" type="button"
                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" id="strandTrack">
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
                    <button class="btn btn-primary btn-user btn-block" wire:click="update" type="button">@lang('Save')</button>
                    <hr>
                </x-forms.post>

</div>
