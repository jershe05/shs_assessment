@extends('frontend.layouts.app')

@section('title', __('Terms & Conditions'))

@section('content')
@include('frontend.includes.header')
<section class="search-course-area relative" >
    <div class="overlay overlay-bg" ></div>
    <div class="container mt-5 mt-5">
        <div class="row justify-content-between align-items-center fullscreen">
            <div class="col-lg-6 col-md-6 search-course-left">
                <h1 class="text-white">
                      Steps to Knowing <br>
                      Which Senior High School Track Best Fits You
                </h1>
                <p class="text-white">
                  Under the Enhanced Basic Education Act of 2013, senior high school (SHS) students must pick among four tracks. Upon enrollment in SHS, they must choose from the following tracks.
                </p>
                <div class="row details-content">

                    <div class="col single-detials">
                        <span class="lnr lnr-license"></span>
                        <a href="#"><h4>Academic Track</h4></a>
                        <p class="text-white">
                          This track appeals to those who have set their minds towards college education. Divided into degree-specific courses, the Academic track in senior high school aims to prepare students to more advanced university courses. Under this umbrella are four strands.
                        </p>
                    </div>
                    <div class="col single-detials">
                      <span class="lnr lnr-license"></span>
                      <a href="#"><h4>Technical-Vocational-Livelihood (TVL) Track</h4></a>
                      <p class="text-white">
                          It calls out to eligible students with subjects focused on job-ready skills. Besides, it offers practical knowledge with matching certificates to help students land their desired job after they graduate from SHS. Under the senior high school tech-voc track are the following strands.
                      </p>
                  </div>
                  <div class="col single-detials">
                      <span class="lnr lnr-license"></span>
                      <a href="#"><h4>Sports Track</h4></a>
                      <p class="text-white">
                          Developed to equip SHS students with sports-related and physical fitness and safety knowledge, this track appeals to those who wish to venture into athletics, fitness, and recreational industries.
                      </p>
                  </div>
                  <div class="col single-detials">
                      <span class="lnr lnr-graduation-hat"></span>
                      <a href="#"><h4>Arts and Design Track</h4></a>
                      <p class="text-white">
                          Inside this course, students with a penchant for the Arts can enroll in subjects that will hone their skills in visual design and the performing arts.
                      </p>
                  </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 search-course-right section-gap">
                <form class="form-wrap pb-5" action="{{ route('frontend.application.store') }}" method="POST">
                    @csrf
                  <h4 class="text-white pb-20 text-center mb-30">PLEASE REGISTER YOU PERSONAL INFORMATION</h4>
                    <input type="text" class="form-control" name="first_name" placeholder="First Name" required>
                    <input type="text" class="form-control" name="last_name" placeholder="Last Name"  >
                    <input type="text" class="form-control" name="middle_name" placeholder="Middle Name" >
                    <input type="text" class="form-control" name="address" placeholder="Address"  required>
                    <input type="email" class="form-control" name="email" placeholder="Email Address"  required>
                    <input type="phone" class="form-control" name="phone" placeholder="Phone Number" required>
                    <input type="text" class="form-control" name="school" placeholder="School" required>

                    <button type="submit" class="primary-btn text-uppercase">Submit</button>
                </form>

                @include('includes.partials.messages')
            </div>

        </div>
    </div>
</section>
@include('frontend.includes.footer')
@endsection
