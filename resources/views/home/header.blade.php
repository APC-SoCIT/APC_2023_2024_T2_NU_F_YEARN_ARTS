<header>
  <nav class="navbar">
    <div class="logo">
      <img src="assets/image/Yearn.jpg" alt="Logo">
      <a href="/">Yearn Art</a>
    </div>
    <div class="menu">
        <div class="menu-links">
            <a href="Products" class="Products">Products</a>
            @if (Route::has('login'))

            @auth
            <a href="{{url('/show_orders')}}" class="Orders">My Orders</a>
            @else

            @endauth

            @endif

            {{-- <a href="{{url('/show_cart')}}" class="Orders">My Orders</a> --}}
            <a href="{{url('/About')}}" class="About">About Us</a>
            <a href="FAQ" class="FAQ">FAQ</a>
            @if (Route::has('login'))

            @auth
            <div class="dropdown">
                <button class="btn-name" type="button" id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <div class="dropdown-item" onclick="goToProfile('{{ route('profile.show') }}')">Profile</div>

                    
                    <div class="dropdown-item">
                      <form id="logoutForm" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <input type="submit" value="Logout">
                      </form>
                    </div>
                </div>
            </div>

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

<script>
  // Handle form submission for logout
document.getElementById('logoutForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting normally

    // Optionally, you can add confirmation before logout
    var confirmLogout = confirm("Are you sure you want to logout?");
    if (confirmLogout) {
        this.submit(); // Submit the form
    }
});

    function goToProfile(url) {
        window.location.href = url;
    }
</script>