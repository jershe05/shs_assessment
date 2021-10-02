@extends('frontend.layouts.app')

@section('title', __('Login'))

@section('content')
    <!-- Outer Row -->
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">'Welcome Back!'</h1>
                                </div>
                                <form class="user">
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user"
                                        name="email" id="email" aria-describedby="emailHelp"
                                            placeholder="{{ __('E-mail Address') }}" value="{{ old('email') }}" maxlength="255" required autofocus autocomplete="email">
                                    </div>
                                    <div class="form-group">

                                        <input type="password" class="form-control form-control-user"
                                        name="password" id="password"
                                        placeholder="{{ __('Password') }}"
                                        maxlength="100" required autocomplete="current-password">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input name="remember" id="remember" class="custom-control-input" type="checkbox" {{ old('remember') ? 'checked' : '' }} />

                                            <label class="custom-control-label" for="remember">
                                                @lang('Remember Me')
                                            </label>

                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-user btn-block" type="submit">@lang('Login')</button>

                                </form>
                                    @if(config('boilerplate.access.captcha.login'))
                                        <div class="row">
                                            <div class="col">
                                                @captcha
                                                <input type="hidden" name="captcha_status" value="true" />
                                            </div><!--col-->
                                        </div><!--row-->
                                    @endif
                                <hr>
                                <div class="text-center">
                                    <x-utils.link :href="route('frontend.auth.password.request')" class="small" :text="__('Forgot Your Password?')" />
                                </div>
                                <div class="text-center">
                                    <x-utils.link :href="route('frontend.auth.register')" class="small" :text="__('Register')" />
                                </div>
                                <div class="text-center">
                                    @include('frontend.auth.includes.social')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
