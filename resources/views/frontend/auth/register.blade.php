@extends('frontend.layouts.app')

@section('title', __('Register'))

@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">@lang('Register')</h1>
                    </div>
                    <x-forms.post  class="user" :action="route('frontend.auth.register')">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="name" id="name"
                            value="{{ old('name') }}" placeholder="{{ __('Name') }}" maxlength="100" required autofocus autocomplete="name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control form-control-user" name="email" id="email"
                            placeholder="{{ __('E-mail Address') }}" value="{{ old('email') }}" maxlength="255" required autocomplete="email">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" class="form-control form-control-user"
                                name="password" id="password" placeholder="{{ __('Password') }}" maxlength="100" required autocomplete="new-password">
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control form-control-user"
                                name="password_confirmation" id="password_confirmation" placeholder="{{ __('Password Confirmation') }}" maxlength="100" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input type="checkbox" name="terms" value="1" id="terms" class="form-check-input" required>
                                        <label class="form-check-label" for="terms">
                                            @lang('I agree to the') <a href="{{ route('frontend.pages.terms') }}" target="_blank">@lang('Terms & Conditions')</a>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            @if(config('boilerplate.access.captcha.registration'))
                                <div class="row">
                                    <div class="col">
                                        @captcha
                                        <input type="hidden" name="captcha_status" value="true" />
                                    </div><!--col-->
                                </div><!--row-->
                            @endif
                        <button class="btn btn-primary btn-user btn-block" type="submit">@lang('Register')</button>
                        <hr>
                    </x-forms.post>

                    <div class="text-center">
                        <x-utils.link :href="route('frontend.auth.password.request')" class="small" :text="__('Forgot Your Password?')" />
                    </div>
                    <div class="text-center">
                        <x-utils.link :href="route('frontend.auth.login')" class="small" :text="__('Already have an account? Login!')" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
