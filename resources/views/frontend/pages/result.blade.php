@extends('frontend.layouts.app')

@section('title', __('Terms & Conditions'))

<section >
            <div class="col-md-6">
                <livewire:assessment applicant="{{ $applicant }}" />
                @include('includes.partials.messages')
            </div>
</section>

