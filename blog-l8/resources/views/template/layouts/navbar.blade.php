<!-- Navbar Header -->
<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
    <div class="container-fluid">
        <div class="collapse" id="search-nav">
            <form class="navbar-left navbar-form nav-search mr-md-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button class="btn btn-search pr-1" id="searchBtn">
                            <i class="fa fa-search search-icon"></i>
                        </button>
                    </div>
                    <input type="text" id="searchInput" placeholder="Search ..." class="form-control">
                </div>
            </form>
        </div>
        <span id="found">
            <button id="prev" class="btn btn-warning" onclick="prev()"><i class="fas fa-arrow-left"></i></button>
            <button id="next" class="btn btn-success mr-3" onclick="next()"><i class="fas fa-arrow-right"></i></button>
            <label id="position" class="text-white h2 font-weight-bold">0</label><span
                class="text-white h2 font-weight-bold ml-1 mr-1">/</span><label id="total"
                class="text-white h2 font-weight-bold">0</label>
        </span>
        <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
            <li class="nav-item toggle-nav-search hidden-caret">
                <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false"
                    aria-controls="search-nav">
                    <i class="fa fa-search"></i>
                </a>
            </li>
            <li class="nav-item dropdown hidden-caret">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                    <div class="avatar-sm">
                        <img src="{{ asset('images/users/'.Auth::user()->photo) }}"
                            alt="Your Photo" class="avatar-img rounded-circle">
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                        <li>
                            <div class="user-box">
                                <div class="u-text">
                                    <h4>Hi, &nbsp;{{ Auth::user()->name }}</h4>
                                    <p class="text-muted">{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">Account
                                Setting</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
                        </li>
                    </div>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<!-- End Navbar -->