<section id="navigation">
    <div class="container">
        <div class="row">
            <div class="col-xs-6">
                <div class="logo"><a data-scroll href="#body" class="logo-text">THE GYM BRO</a></div>
            </div>
            <div class="col-xs-6">
                <div class="nav">
                    <a data-placement="bottom" title="Menu" class="menu" data-toggle="dropdown"><i class="pe-7s-menu"></i></a>
                    <div class="dropdown-menu">
                        <div class="arrow-up"></div>
                        <ul>
                            <li><a data-scroll href="{{url('/')}}">Home <i class="pe-7s-home"></i></a><span class="menu-effect"></span></li>
                            <li><a data-scroll href="{{url('/dashboard')}}">All Products <i class="pe-7s-shopbag"></i></a><span class="menu-effect"></span></li>
                            @if(Route::has('login'))
                            @auth
                            <li><a data-scroll href="{{url('/your_cart')}}">Cart <i class="pe-7s-cart"></i></a><span class="menu-effect"></span></li>
                            <li><a data-scroll href="{{ route('profile.show')}}">Profile <i class="pe-7s-user"></i></a><span class="menu-effect"></span></li>
                            <li><a data-scroll href="{{url('/your_orders')}}">Your Orders <i class="pe-7s-note2"></i><span class="menu-effect"></span></a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <a data-scroll href="{{ route('logout') }} " style="color: #E50914;" onclick="event.preventDefault();
                                        this.closest('form').submit(); ">
                                        {{ __('Log Out') }} <i class=" pe-7s-upload" style="transform: rotate(90deg);"></i></a><span class="menu-effect"></span>

                                </form>
                            </li>
                            @else
                            <li><a data-scroll href="{{url('/login')}}">Login/SignUp <i class="pe-7s-user"></i></a><span class="menu-effect"></span></li>
                            @endauth
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>