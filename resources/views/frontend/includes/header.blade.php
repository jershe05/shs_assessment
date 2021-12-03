<header id="header" id="home">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-8 header-top-left no-padding">
                    <ul>
                      <li><a href="https://www.facebook.com/LNUdagupanofficial/"><i class="fab fa-facebook"></i></a></li>
                      <li><a href="https://www.instagram.com/lnu_official/"><i class="fab fa-instagram"></i></a></li>
                      <li><a href="https://twitter.com/lnu_dagupan"><i class="fab fa-twitter"></i></i></a></li>
                    </ul>
                </div>
                <div class="col-lg-6 col-sm-6 col-4 header-top-right no-padding d-flex justify-content-end">
                    <div>
                    <a href="tel:+953 012 3654 896"><i class="fas fa-phone"></i> <span class="text">(075) 515-7633</span></a>
                    <a href="mailto:support@colorlib.com"><i class="far fa-envelope"></i> <span class="text">fsu@lyceum.edu.ph</span></a>
                    </div>
                    @auth
                    <x-utils.link class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <x-slot name="text">
                                <div class="c-avatar">
                                    <img class="c-avatar-img" src="{{ $logged_in_user->avatar }}" alt="{{ $logged_in_user->email ?? '' }}">
                                </div>
                            </x-slot>
                        </x-utils.link>

                         <div class="dropdown-menu dropdown-menu-right pt-0">
                            <div class="dropdown-header bg-light py-2">
                                <strong>@lang('Account')</strong>
                            </div>

                            <x-utils.link
                                class="dropdown-item text-dark"
                                icon="c-icon mr-2 cil-account-logout"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <x-slot name="text">
                                    @lang('Logout')
                                    <x-forms.post :action="route('frontend.auth.logout')" id="logout-form" class="d-none" />
                                </x-slot>
                            </x-utils.link>

                        </div>

                        @endauth
                </div>
            </div>
        </div>
  </div>
  <div class="container main-menu">
      <div class="row align-items-center justify-content-between d-flex">
        <div class="row align-items-center justify-content-between d-flex">
            <div class="pr-2">
                <img src="{{ asset('img/Lyceum_logo.png') }}" width="50" alt="" title="" />
            </div>
            <div>
                 <h4 class="text-white">LYCEUM-NORTHWESTERN UNIVERSITY SHS</h4>
            </div>
        </div>

        <nav id="nav-menu-container">
         <ul class="nav-menu">
        @auth
            <x-utils.link class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <x-slot name="text">
                                Settings
                            </x-slot>
            </x-utils.link>

                <div class="dropdown-menu dropdown-menu-right pt-0">
                    <div class="dropdown-header bg-light py-2">
                        <strong>@lang('Account Management')</strong>
                    </div>
                        <x-utils.link
                        class="dropdown-item text-dark"
                        icon="c-icon mr-2 cil-education"
                        href="{{ route('admin.tracks') }}">
                        <x-slot name="text">
                            @lang('Tracks')
                        </x-slot>
                        </x-utils.link>
                        <x-utils.link
                        class="dropdown-item text-dark"
                        icon="c-icon mr-2 cil-align-center"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <x-slot name="text">
                            @lang('Questions')
                            <x-forms.post :action="route('frontend.auth.logout')" id="logout-form" class="d-none" />
                        </x-slot>
                        </x-utils.link>
                        <x-utils.link
                        class="dropdown-item text-dark"
                        icon="c-icon mr-2 cil-clipboard"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <x-slot name="text">
                            @lang('Reports')
                            <x-forms.post :action="route('frontend.auth.logout')" id="logout-form" class="d-none" />
                        </x-slot>
                        </x-utils.link>
                        <x-utils.link
                            class="dropdown-item text-dark"
                            icon="c-icon mr-2 cil-user"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <x-slot name="text">
                                @lang('Users')
                                <x-forms.post :action="route('frontend.auth.logout')" id="logout-form" class="d-none" />
                            </x-slot>
                        </x-utils.link>
                        <x-utils.link
                            class="dropdown-item text-dark"
                            icon="c-icon mr-2 cil-contact"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <x-slot name="text">
                                @lang('Roles')
                                <x-forms.post :action="route('frontend.auth.logout')" id="logout-form" class="d-none" />
                            </x-slot>
                        </x-utils.link>
                </div>
        @else
            <li><a href="{{ route('frontend.auth.login') }}">Login</a></li>
        @endauth

         </ul>
        </nav><!-- #nav-menu-container -->
      </div>
  </div>
</header><!-- #header -->
