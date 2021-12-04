@extends('frontend.layouts.app')

@section('title', __('Terms & Conditions'))

@section('content')
@include('frontend.includes.header')
<section class="search-course-area relative" >
    <div class="overlay overlay-bg" ></div>
    <div class=" container mt-5 mt-5">
        <div class="row mt-5 justify-content-center align-items-center fullscreen " >
            <div class="col-md-10" style="margin-top: 200px">
                <x-backend.card>
                    <x-slot name="header">
                        Applicant List
                    </x-slot>
                    <x-slot name="headerActions">
                        <x-utils.link
                            icon="c-icon cil-plus"
                            class="card-header-action"
                            :href="route('admin.tracks')"
                            :text="__('Back')"
                        />
                    </x-slot>
                    <x-slot name="body">
                        <div class="container py-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <livewire:student-list-per-strand strand="{{ $strand->id }}" />

                                </div><!--col-md-8-->
                            </div><!--row-->
                        </div><!--container-->
                    </x-slot>

                </x-backend.card>
                <x-backend.card>
                    <x-slot name="header">
                        @lang($strand->name)
                    </x-slot>
                    <x-slot name="headerActions">
                        <x-utils.link
                            icon="c-icon cil-plus"
                            class="card-header-action"
                            data-toggle="modal"
                            data-target=".add-question"
                            :text="__('Add Question')"
                        />
                    </x-slot>
                    <x-slot name="body">
                        <div class="container py-4">
                            <div class="row">
                                <div class="col-md-12">

                                    <livewire:question-table strandId="{{ $strand->id }}" />
                                </div><!--col-md-8-->
                            </div><!--row-->
                        </div><!--container-->

                    <div class="modal fade add-question" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <livewire:add-question strandId="{{ $strand->id }}" />
                        </div>
                    </div>
                    </div>
                    </x-slot>

                </x-backend.card>

            </div>
        </div>
    </div>
</section>
@include('frontend.includes.footer')
