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
        <h1 class="display-4">Congratulations!</h1>
        <p class="lead">You did well with your assessment test. We are looking forward to welcoming you as one of our senior high students </p>
        <hr class="my-4">
        <p>Thank you so much for selecting our school.</p>
        <table class="table table-borderless">
            <thead>
              <tr>
                <th scope="col">Strand</th>
                <th scope="col">Score</th>
                <th scope="col">%</th>
              </tr>
            </thead>
            <tbody>
             @foreach ($strands as $item)
                <tr>
                    <th scope="row">{{ $item->name }}</th>
                    <td>{{ $score[$item->id] .'/'. count($item->question) }}</td>
                    @if($score[$item->id])
                        <td>{{ number_format($score[$item->id] / count($item->question) * 100, 2) }}%</td>
                        @else
                        <td>0%</td>
                    @endif
                </tr>
             @endforeach

            </tbody>
          </table>
        <p class="lead">
          <a class="btn btn-primary btn-lg" href="{{ route('frontend.result', ['applicant' => $applicant]) }}" role="button">Download Result</a>
        </p>
      </div>

    @endif
</div>
