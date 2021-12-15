@extends('frontend.layouts.app')

@section('title', __('Dashboard'))

@section('content')
@include('frontend.includes.header')
<section class="search-course-area relative" >
    <div class="overlay overlay-bg" ></div>
    <div class="container mt-5 mt-5">
        <div class="row justify-content-center align-items-center fullscreen ">
            <div class="col-md-12" style="margin-top: 150px">
                <x-frontend.card>
                    <x-slot name="header">
                        @lang('Dashboard')
                    </x-slot>

                    <x-slot name="body">
                        <div class="row">
                        <div class="col-8">
                            <div style="max-width: 900px">
                                <canvas id="pie" width="100" height="100"></canvas>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card " style="width: 18rem;">
                                <div class="card-body">
                                  <h5 class="card-title text-danger">Number of Applicants</h5>

                                  <h1 class="card-text text-primary">{{ $applicant }}</h1>

                                </div>
                              </div>

                            <div class="card" >
                                <div class="card-body">
                                  <h3 class="card-title text-danger">Number of Applicants/Strand</h3>
                                  <hr />
                                </div>
                                @foreach ($studentPerStrand as $strand)
                                    <div class="d-flex justify-content-between pl-4 pr-4">
                                        <p>{{ $strand->strand->name }}</p>
                                        <h4 class="text-primary">{{ $strand->total }}

                                    </div>
                                    <hr />
                                @endforeach

                              </div>
                        </div>
                        </div>

                    </div>
                    </x-slot>
                </x-frontend.card>
            </div><!--col-md-10-->
        </div><!--row-->
        </div>
    </div>
</section>
@include('frontend.includes.footer')
    {{-- <x-backend.card>
        <x-slot name="header">
            @lang('Welcome :Name', ['name' => $logged_in_user->name])
        </x-slot>

        <x-slot name="body">
            @lang('Welcome to the Dashboard')
        </x-slot>
    </x-backend.card> --}}
@endsection
