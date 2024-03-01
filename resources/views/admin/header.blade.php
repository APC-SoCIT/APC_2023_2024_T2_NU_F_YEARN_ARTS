<style>

.navbar a{
    font-family: Inter;
    font-size: 14px;
    text-decoration: none;
  }
/* Hide the dropdown menu by default */

.dropdown-menu {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
  z-index: 1;
}
.dropdown-item {
  background-color: transparent;
  color: #7D5452;
  border: none;
  padding: 0.375rem 0.75rem;
  cursor: pointer;
}

/* Show the dropdown menu on hover */
 .dropdown-menu {
 margin-top: 110px;
}



</style>

<div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="admin/assets/images/logo-mini.svg" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav w-100">
              <li class="nav-item w-100">

              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">





              <li>
                <div class="down">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">


                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <input type="submit" value="Logout">

                        </form>
                    </div>
                </div>
              </li>

            </ul>

          </div>
        </nav>
