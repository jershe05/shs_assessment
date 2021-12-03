<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="shortcut icon" href="{{ asset('img/fav.png') }}">
        <title>{{ appName() }}</title>
        <meta name="description" content="@yield('meta_description', appName())">
        <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
        @yield('meta')

        @stack('before-styles')
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ mix('css/frontend.css') }}" rel="stylesheet">
        @stack('after-styles')
    </head>
    <body>
        {{-- https://technext.github.io/education/# --}}
        @include('includes.partials.read-only')
        @include('includes.partials.logged-in-as')
        {{-- @include('includes.partials.announcements') --}}

        <div id="app" class="flex-center position-ref full-height">
            <div class="top-right links">
                @auth
                    @if ($logged_in_user->isUser())
                        <a href="{{ route('frontend.user.dashboard') }}">@lang('Dashboard')</a>
                    @endif

                    <a href="{{ route('frontend.user.account') }}">@lang('Account')</a>
                @else
                    <a href="{{ route('frontend.auth.login') }}">@lang('Login')</a>

                    @if (config('boilerplate.access.user.registration'))
                        <a href="{{ route('frontend.auth.register') }}">@lang('Register')</a>
                    @endif
                @endauth
            </div><!--top-right-->

            <div class="content">
                @include('frontend.includes.header');

                  <!-- start banner Area -->
                  <section class="banner-area relative" id="home">
                      <div class="overlay overlay-bg"></div>
                      <div class="container">
                          <div class="row fullscreen d-flex align-items-center justify-content-between">
                              <div class="banner-content col-lg-9 col-md-12">
                                  <h1 class="text-uppercase">
                                      LNU SHS ASSESSMENT
                                  </h1>
                                  <p class="pt-10 pb-10">
                                    VISION 2020<br />

                                    Internationally recognized private University as a model of excellence in integrated instruction, research, and public engagement.
                                    <br />
                                    <br />
                                    MISSION
                                    <br />
                                    Produce graduates who are ethically and socially responsible employees of choice, entrepreneurs and leaders in both public and private sector institutions.
                                  </p>
                                  <a href="{{ route('frontend.application.registration') }}" class="primary-btn text-uppercase">START ASSESSMENT</a>
                              </div>
                          </div>
                      </div>
                  </section>
                  <!-- End banner Area -->

                  <!-- Start feature Area -->
                  <section class="feature-area" id="assessment">
                      <div class="container">
                          <div class="row">
                              <div class="col-lg-4">
                                  <div class="single-feature">
                                      <div class="title">
                                          <h4>Learn Online Courses</h4>
                                      </div>
                                      <div class="desc-wrap">
                                          <p>
                                              Usage of the Internet is becoming more common due to rapid advancement
                                              of technology.
                                          </p>
                                          {{-- <a href="#">Join Now</a>									 --}}
                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-4">
                                  <div class="single-feature">
                                      <div class="title">
                                          <h4>No.1 of universities</h4>
                                      </div>
                                      <div class="desc-wrap">
                                          <p>
                                              For many of us, our very first experience of learning about the celestial bodies begins when we saw our first.
                                          </p>
                                          {{-- <a href="#">Join Now</a>									 --}}
                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-4">
                                  <div class="single-feature">
                                      <div class="title">
                                          <h4>Huge Library</h4>
                                      </div>
                                      <div class="desc-wrap">
                                          <p>
                                              If you are a serious astronomy fanatic like a lot of us are, you can probably remember that one event.
                                          </p>
                                          {{-- <a href="#">Join Now</a>									 --}}
                                      </div>
                                  </div>
                              </div>
                          </div>
                          @include('includes.partials.messages')
                      </div>
                  </section>
                  <!-- End feature Area -->


                  <!-- Start search-course Area -->

                  <!-- End search-course Area -->




                  <!-- Start cta-two Area -->
                  <section class="cta-two-area">
                      <div class="container">
                          <div class="row">
                              <div class="col-lg-8 cta-left">
                                  <h1>Not Yet Satisfied with our Trend?</h1>
                              </div>
                              <div class="col-lg-4 cta-right">
                                  <a class="primary-btn wh" href="#">view our blog</a>
                              </div>
                          </div>
                      </div>
                  </section>
                  <!-- End cta-two Area -->
        @include('frontend.includes.footer')
        @stack('before-scripts')
        <script src="{{ mix('js/manifest.js') }}"></script>
        <script src="{{ mix('js/vendor.js') }}"></script>
        <script src="{{ mix('js/frontend.js') }}"></script>
        @stack('after-scripts')
    </body>
</html>
