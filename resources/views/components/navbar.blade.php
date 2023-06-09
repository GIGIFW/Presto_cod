<div id="mainNavigation">
    <nav role="navigation">

      
      {{-- BOTTONE ANIMATO --}}
 {{-- <div class="search-box">
    <button class="btn-search"><i class="fas fa-search"></i></button>
    <input type="text" class="input-search" placeholder="Type to Search...">
  </div>  --}}
  {{-- FINE BOTTONE ANIMATO --}}


        <div class="py-3 text-center" id="navLogo">
            <div class="d-flex justify-content-end">
                <x-_locale lang="it" />
                <x-_locale lang="en" />
                <x-_locale lang="es" />
            </div>

        {{-- <img src="/media/presto.png" alt="" class="invert logo-image" height="100" width="100"> --}}
        {{-- <div class="LogoSize">
          <div class="wrapperTitle">
            <div class="cardTitle">
              <h1 class="fontTitle">
                <span class="enclosedTitle">Presto</span>.it
              </h1>
            </div>
          </div>
        </div> --}}
        
        <div class="d-flex justify-content-center">
          <img class="logos fade-in-top" src="/media/8DB2CAB0-52CF-4989-A0B6-22BB6E51FA69_4_5005_c-PhotoRoom.png" alt="">
        </div>
    </nav>
    <div class="navbar-expand-xl m-0" id="subNav">
        <div class="navbar-dark text-center menuDrop">
            <button class="navbar-toggler w-75 navBut" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span> <span class="align-middle menu ">Menu</span>
            </button>
        </div>
        <div class="text-center mt-0 collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            {{-- <div class="space"></div> --}}
            <ul class="navbar-nav d-flex justify-content-center align-items-center w-100">
            <ul class="navbar-nav mt-2 d-flex justify-content-center w-100 dropdownMenuMobile">
                <li class="nav-item">
                    <a class="nav-link active home" aria-current="page" href="{{ route('homepage') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('articles.create') }}">{{ __('ui.postAd') }}</a>
                </li>

                <div class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle colorText size" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('ui.ads') }}
                    </a>
                    {{-- Dropdown annunci --}}
                    <ul class="dropdown-menu bg-menu mt-2">
                        <a href="{{ route('articles.index') }}">
                            <li class="dropdown-item colorText colorTextDD">{{ __('ui.allAds') }}</li>
                        </a>
                        <hr class="line-separator">
                        @foreach ($categories as $category)
                            <a href="{{ route('category', compact('category')) }}">
                                <li class="dropdown-item colorTextDD">
                                    <span class="{{$category->icon}}"></span> 

                                    @switch(Config::get('app.locale'))
                                        @case('it')
                                            {{ $category->nameIt }}
                                        @break

                                        @case('en')
                                            {{ $category->nameEn }}
                                        @break

                                        @case('es')
                                            {{ $category->nameEs }}
                                        @break

                                        @default
                                    @endswitch
                                </li>

                            </a>
                        @endforeach
                    </ul>
                </div>
                @auth
                    {{-- dropdown utente registrato --}}
                    {{-- tasto per i revisori --}}
                    @if (Auth::user()->is_revaisor)
                        <div class="nav-item d-flex align-items-center me-4 position-relative">
                            <a href="{{ route('revaisor.index') }}">
                                {{ __('ui.reviewAds') }}
                            </a>
                            <span class="position-absolute top-0 start-100 translate-middle ">
                                @livewire('not-revisione-count')
                            </span>
                        </div>
                    @endif
                    {{-- end tasto dei revisori --}}
                    <div class="nav-item dropdown colorText align-items-center">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ __('ui.welcome') }}, {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu bg-menu">

                            <li><a class="dropdown-item colorTextDD"
                                    href="{{ route('articles.own') }}">{{ __('ui.yourAds') }}</a></li>
                            <li><a class="dropdown-item colorTextDD"
                                    href="{{ route('articles.prefer') }}">{{ __('ui.favourite') }}</a></li>
                           

                            
                            <li><a class="dropdown-item colorTextDD"
                                    href="{{ route('articles.prefer') }}">{{ __('ui.favourite') }}</a></li>

                            <li><a class="dropdown-item colorTextDD" href=""
                                    onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a>
                            </li>
                            <form class="d-none" method="POST" action="{{ route('logout') }}" id="form-logout">@csrf
                            </form>
                            <li>
                                <button type="button" class="dropdown-item colorTextDD text-uppercase" data-bs-toggle="modal"
                                data-bs-target="#workModal">
                                    
                                        {{ __('ui.workUs') }}
                                </button> 
                            </li>

                        </ul>
                    </div>


                    {{-- end dropdown registrato --}}
                @else
                    {{-- dropdown utente --}}



                    <div class="nav-item dropdown colorText size">


                        {{-- Accedi --}}
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Login
                        </a>

                        {{-- Dropdown Login e Register --}}
                        <ul class="dropdown-menu bg-menu mt-3">
                            <li><a class="dropdown-item toggle-color colorTextDD" href="{{ route('login') }}">Login</a>
                            </li>
                            <li><a class="dropdown-item toggle-color colorTextDD"
                                    href="{{ route('register') }}">{{ __('ui.register') }}</a></li>
                        </ul>
                    </div>
                    {{-- end drop down utente --}}
                @endauth
            </ul>
            {{-- tasti cambio lingua --}}

            {{-- end tasti cambio lingua --}}
        </div>
    </div>
</div>
<div class="separatore"></div>

<div class="modal fade" id="workModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('ui.reviewBecome') }}</h1>
                <button type="button" class="bg-transparent border-0" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-sharp fa-solid fs-2 fa-xmark"></i></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('become.revaisor') }}" method="POST">
                    @csrf
                    <label for="whyWork">{{ __('ui.why') }}</label>
                    <textarea class="form-control" name="whyWork" id="whyWork" cols="30" rows="7"></textarea>
                    <div class="mt-2 d-flex justify-content-center">
                        <btn-custom data-bs-dismiss="modal" class="me-4">
                            <ul>
                                <li>
                                    <a class="facebook text-uppercase" href="#">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        {{ __('ui.close') }}
                                    </a>
                                </li>
                            </ul>
                        </btn-custom>
                        <button class="border-0 bg-transparent" type="submit">
                            <btn-custom >
                                <ul>
                                    <li>
                                        <a  class="facebook text-uppercase">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            {{ __('ui.apply') }}
                                        </a>
                                    </li>
                                </ul>
                            </btn-custom>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
