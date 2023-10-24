<x-profile>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>
    <section class="bg0 p-t-23 p-b-130" style="background-color: #1e1e1e;">
        <div class="container rounded-div" style="background-color: #2d2d30	;">
        <div class="container-fluid">
    <div class="p-b-20">
        <h3 class="p-overview">
            <a href="{{url('/')}}" style="text-decoration: none; color: inherit;">THE GYM BRO</a>
            
            <a data-placement="bottom" title="Menu" class="p-menu pointer" id="menuToggle"><i class="pe-7s-menu"></i></a>

        </h3>
        <div class="p-dropdown-menu" id="dropdownContent">
            <div class="p-arrow-up"></div>
            <ul>
                <li style="color: #FE3442;"><a class=" hov-cl1" class=" hov-cl1" href="{{url('/')}}">Home <i class="pe-7s-home"></i></a><span class="menu-effect"></span></li>
                <li style="color: #FE3442;"><a class=" hov-cl1" href="{{url('/dashboard')}}">ALL Products <i class=" pe-7s-shopbag"></i></a><span class="menu-effect"></span></li>
                @if(Route::has('login'))
                @auth
                <li style="color: #FE3442;"><a class=" hov-cl1" href="{{ route('profile.show')}}">Profile <i class="pe-7s-user"></i></a><span class="menu-effect"></span></li>
                <li style="color: #FE3442;"><a class=" hov-cl1" href="{{url('/your_cart')}}">Cart <i class=" pe-7s-cart"></i></a><span class="menu-effect"></span></li>
                <li style="color: #FE3442;"><a class=" hov-cl1" href="{{url('/your_orders')}}">Your Orders <i class="pe-7s-note2"></i></a><span class="menu-effect"></span></li>
                <li style="color: #FE3442;">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        
                            <a a class=" hov-cl1" href="{{ route('logout') }}" onclick="event.preventDefault();
                        this.closest('form').submit(); ">
                                {{ __('Log Out') }} <i class=" pe-7s-upload" style="transform: rotate(90deg);"></i></a><span class="menu-effect"></span>
                        
                    </form>
                </li>
                @else
                <li><a href="{{url('/login')}}">Login/SignUp <i class=" pe-7s-user"></i></a><span class="menu-effect"></span></li>
                @endauth
                @endif
            </ul>
        </div>
    </div>

</div>
    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-section-border />
            @endif
            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
        </div>
    </section>
    @include('all_products.footer')
	<script>
		// Get references to the menu toggle link and dropdown content
		const menuToggle = document.getElementById("menuToggle");
		const dropdownContent = document.getElementById("dropdownContent");

		// Add a click event listener to the menu toggle link
		menuToggle.addEventListener("click", function() {
			if (dropdownContent.style.display === "block") {
				dropdownContent.style.display = "none";
			} else {
				dropdownContent.style.display = "block";
			}
		});
	</script>
	
</x-profile>
