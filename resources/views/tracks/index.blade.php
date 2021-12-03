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
                    @lang('Strand list')
                </x-slot>
                <x-slot name="headerActions">

                    <x-utils.link
                        icon="c-icon cil-plus"
                        class="card-header-action"
                        data-toggle="modal"
                        data-target="#addTrack"
                        data-backdrop="static"
                        data-keyboard="false"
                        :text="__('Add Strand')"
                    />
                </x-slot>

                <x-slot name="body">
                    <div class="container py-4">
                        <div class="row">
                            <div class="col-md-12">
                                <livewire:tracks-table />
                            </div><!--col-md-8-->
                        </div><!--row-->
                    </div><!--container-->
                    <livewire:add-tracks />
                </x-slot>

            </x-backend.card>
        </div>
    </div>
</section>
@include('frontend.includes.footer')
