@extends('frontend.layouts.app')

@section('title', __('Dashboard'))

@section('content')
@include('frontend.includes.header')
<section class="search-course-area relative" >
    <div class="overlay overlay-bg" ></div>
    <div class="container mt-5 mt-5">
        <div class="row justify-content-center align-items-center fullscreen ">
            <div class="col-md-6">
                <div class="container1 mt-sm-5 my-1">
                    <div class="question pt-2 justify-content-center">
                        <section class="feature-area pb-5 " id="assessment">
                            <div class="container ">
                                <div class="row ">
                                    <div class="single-feature w-100">
                                        <div class="title">
                                            <h4>Huge Library</h4>
                                        </div>
                                        <div class="desc-wrap">
                                            <p class="text-secondary">
                                                Please select the best answer.
                                            </p>
                                            {{-- <a href="#">Join Now</a>									 --}}
                                        </div>
                                    </div>
                                </div>
                                @include('includes.partials.messages')
                            </div>
                        </section>
                        <div class="py-2 h5"><b>Q. which option best describes your job role?</b></div>
                        <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                            <label class="options">Small Business Owner or Employee
                                <input type="radio" name="radio"> <span class="checkmark"></span>
                            </label>
                            <label class="options">Nonprofit Owner or Employee
                                <input type="radio" name="radio"> <span class="checkmark"></span>
                            </label>
                            <label class="options">Journalist or Activist
                                <input type="radio" name="radio"> <span class="checkmark"></span>
                            </label>
                            <label class="options">Other <input type="radio" name="radio">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center pt-3 ml-2">
                        {{-- <div id="prev"> <button class="btn btn-primary">Previous</button> </div> --}}
                        <div class="ml-auto mr-sm-5"> <button class="btn btn-success">Next</button> </div>
                    </div>
                </div>
                @include('includes.partials.messages')
            </div>

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
