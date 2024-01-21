<header>
  <nav class="navbar">
    <div class="logo">
      <img src="assets/image/Yearn.jpg" alt="Logo">
      <a href="/">Yearn Art</a>
    </div>
    <div class="menu">
        <div class="menu-links">
            <a href="Products" class="Products">Products</a>
            <a href="{{url('/show_cart')}}" class="Orders">Cart</a>
            <a href="{{url('/About')}}" class="About">About Us</a>
            <a href="FAQ" class="FAQ">FAQ</a>
            @if (Route::has('login'))

            @auth
            <x-app-layout>

            </x-app-layout>
            @else
            <a href="login" class="Login">Log in</a>
            <a href="register" class="Signup">Signup</a>
            @endauth

            @endif
        </div>
    </div>
    <div class="menu-btn">
      <i class="fa-solid fa-bars"></i>
    </div>
  </nav>

</header>
