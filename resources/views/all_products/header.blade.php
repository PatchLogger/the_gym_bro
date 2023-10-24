<div class="container-fluid">
    <div class="p-b-20">
        <h3 class="p-overview">
            <a href="{{url('/')}}" style="text-decoration: none; color: inherit;">THE GYM BRO</a>
            @if(Route::has('login'))
            @auth
            <div class="wrap-icon-header flex-w flex-r-m m-r-20">
                <div class="icon-header-item cl0 p-t-10  hov-cl1 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="{{$count}}">
                    <a href="{{url('your_cart')}} " style="text-decoration: none; color: inherit;"><i class="zmdi zmdi-shopping-cart"></i></a>
                </div>
            </div>
            @endauth
            @endif
            <a data-placement="bottom" title="Menu" class="p-menu pointer" id="menuToggle"><i class="pe-7s-menu"></i></a>

        </h3>
        <div class="p-dropdown-menu" id="dropdownContent">
            <div class="p-arrow-up"></div>
            <ul>
                <li><a href="{{url('/')}}" style="color: #E50914;"> Home <i class="pe-7s-home"></i></a><span class="menu-effect"></span></li>
                <li><a href="{{url('/dashboard')}}" style="color: #E50914;">All Products <i class=" pe-7s-shopbag"></i></a><span class="menu-effect"></span></li>
                @if(Route::has('login'))
                @auth
                <li><a href="{{ route('profile.show')}}" style="color: #E50914;"> Profile <i class="pe-7s-user"></i></a><span class="menu-effect"></span></li>
                <li><a href="{{url('/your_orders')}}" style="color: #E50914;">Your Orders <i class="pe-7s-note2"></i></a><span class="menu-effect"></span></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        
                            <a href="{{ route('logout') }} " style="color: #E50914;" onclick="event.preventDefault();
                        this.closest('form').submit(); ">
                                {{ __('Log Out') }} <i class=" pe-7s-upload" style="transform: rotate(90deg);"></i></a><span class="menu-effect"></span>
                        
                    </form>
                </li>
                @else
                <li><a href="{{url('/login')}}" style="color: #E50914;">Login/SignUp <i class=" pe-7s-user"></i></a><span class="menu-effect"></span></li>
                @endauth
                @endif
            </ul>
        </div>
    </div>

</div>