@extends('frontend.layouts.app')

@section('title', __('Terms & Conditions'))

@section('content')
@include('frontend.includes.header')
<section class="search-course-area relative" >
    <div class="overlay overlay-bg" ></div>
    <div class="container mt-5 mt-5">
        <div class="row justify-content-center align-items-center fullscreen ">
            <div class="col-md-6">
                <livewire:assessment applicant="{{ $applicant->id }}" />
                @include('includes.partials.messages')
            </div>

        </div>
    </div>
</section>
@include('frontend.includes.footer')
