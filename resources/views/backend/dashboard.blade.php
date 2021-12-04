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
                        <div style="max-width: 900px">
                            <canvas id="pie" width="100" height="100"></canvas>
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
