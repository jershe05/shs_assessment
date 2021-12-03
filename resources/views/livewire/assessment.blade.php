<div>
    @if(!$finish)
    <div class="container1 mt-sm-5 my-1">
        <div class="question pt-2 justify-content-center">
            <section class="feature-area pb-5 " id="assessment">
                <div class="container ">
                    <div class="row ">
                        <div class="single-feature w-100">
                            <div class="desc-wrap">
                                <p class="text-dark">
                                    {{ $strand->name }}

                                </p>
                                @error('answer') <span class="text-danger">Please select your answer.</span> @enderror
                                {{-- <a href="#">Join Now</a>									 --}}
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="py-2 h5"><b>{{ '(' . ($questionIndex + 1) . '/' . count($questions) . ') ' . $question['title'] }}</b></div>
            <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                @foreach ($options as $option)
                    <label class="options">{{ $option->answer }}
                        <input wire:model="answer" type="radio" name="radio" value="{{ $option->id }}"> <span class="checkmark"></span>
                    </label>
                @endforeach


            </div>
        </div>
        <div class="d-flex justify-content-center pt-3 ml-2">
            {{-- <div id="prev"> <button class="btn btn-primary">Previous</button> </div> --}}
            <div class="ml-auto mr-sm-5"> <button class="btn btn-success" wire:click="submitAnswer">Next</button> </div>
        </div>
    </div>
    @else
    <div class="jumbotron alert alert-success ">
        <h1 class="display-4">Hello, world!</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <p class="lead">
          <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </p>
      </div>

    @endif
</div>
