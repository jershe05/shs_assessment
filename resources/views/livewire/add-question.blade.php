<div>
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            @if($isEdit)
                            <h1 class="h4 text-gray-900 mb-4">@lang('Edit Question')</h1>
                            @else
                            <h1 class="h4 text-gray-900 mb-4">@lang('Add Question')</h1>
                            @endif

                        </div>
                        @if($message)
                        <div class="alert alert-success" role="alert">
                            {{ $message }}
                          </div>
                          @endif
                        <form class="user" action="{{ route('admin.strand.show', ['strand' => $strandId]) }}">
                            <div class="form-group">
                                <input wire:model="question" type="text" class="form-control form-control-user"
                                 placeholder="{{ __('Question') }}"  required autofocus >
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user"
                                    wire:model="option1" placeholder="{{ __('Option 1') }}" maxlength="100" required >
                                </div>
                                <div class="col-sm-6">
                                    <input wire:model="isOption1Correct" type="checkbox" name="terms"  id="terms" class="form-check-input form-control-user"
                                    @if($isOption1Correct)
                                        checked
                                    @endif
                                    >
                                    <label class="form-check-label" for="terms">
                                       Correct Answer
                                    </label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user"
                                    wire:model="option2" placeholder="{{ __('Option 2') }}" maxlength="100" required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="checkbox" wire:model="isOption2Correct" name="terms" id="terms" class="form-check-input form-control-user"
                                    @if($isOption2Correct)
                                        checked
                                    @endif>
                                    <label class="form-check-label" for="terms">
                                       Correct Answer
                                    </label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user"
                                    wire:model="option3" placeholder="{{ __('Option 3') }}" maxlength="100" required >
                                </div>
                                <div class="col-sm-6">
                                    <input type="checkbox" wire:model="isOption3Correct" name="terms"  id="terms" class="form-check-input form-control-user"
                                    @if($isOption3Correct)
                                        checked
                                    @endif
                                    >
                                    <label class="form-check-label" for="terms">
                                       Correct Answer
                                    </label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user"
                                     wire:model="option4" placeholder="{{ __('Option 4') }}" maxlength="100" required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="checkbox" wire:model="isOption4Correct" name="terms" id="terms" class="form-check-input form-control-user"
                                    @if($isOption4Correct)
                                        checked
                                    @endif
                                    >
                                    <label class="form-check-label" for="terms">
                                       Correct Answer
                                    </label>
                                </div>
                            </div>
                            <button wire:click="add" class="btn btn-primary btn-user btn-block" type="submit">
                                @if($isEdit)
                                     @lang('Save')
                                @else
                                    @lang('Add')
                                @endif
                            </button>
                            <hr>
                        </form>

                    </div>
                </div>

        </div>
    </div>
</div>
