@extends('frontend.layouts.app')

@section('title', __('Terms & Conditions'))

@section('content')
@include('frontend.includes.header')
<section class="search-course-area relative" >
    <div class="overlay overlay-bg" ></div>
    <div class="container mt-5 mt-5"><br /><br /><br /><br /><br />
        <div class="mt-5 justify-content-center align-items-center fullscreen " >
            <x-backend.card>
                <x-slot name="header">
                    @lang('Edit Question')
                </x-slot>
                <x-slot name="headerActions">


                </x-slot>

                <x-slot name="body">
                    <div class="container py-4">
                        <div class="row">
                            <div class="col-md-12">
                                <livewire:add-question strandId="{{ $strandId }}"  questionId="{{ $question->id }}" isEdit="true" />
                            </div><!--col-md-8-->
                        </div><!--row-->
                    </div><!--container-->
                </x-slot>

            </x-backend.card>
        </div>
    </div>
</section>
@include('frontend.includes.footer')
