<header id="header" class="header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyChangeLogo': true, 'stickyStartAt': 120, 'stickyHeaderContainerHeight': 85}">
    <div class="header-body border-top-0">
        <div class="header-top header-top-default header-top-borders border-bottom-0 bg-dark">
            <div class="container">
                <div class="header-row">
                    <div class="header-column justify-content-between">
                        <div class="header-row">
                            <div class="d-flex align-items-center w-100 w-sm-50pct w-md-100pct">
                            </div>
                            <div class="w-50pct w-md-50pct w-lg-100pct d-none d-sm-block">
                                <span class="d-flex align-items-center justify-content-end text-color-light font-weight-semibold text-2-5">
                                    <i class="icon icon-clock font-weight-bold me-2"></i>
                                    <span id="tanggalwaktu"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-container container" style="height: 110px;">
            <div class="header-row">
                <div class="header-column">
                    <div class="header-row">
                        <div class="header-logo">
                            <a href="demo-restaurant.html">
                                <img alt="Porto" width="123" height="48" src="img/demos/restaurant/logo.png">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="header-column justify-content-end w-100">
                    <div class="header-row">
                        <div class="header-nav header-nav-links order-2 order-lg-1">
                            <div class="header-nav-main header-nav-main-text-capitalize header-nav-main-effect-1 header-nav-main-sub-effect-1">
                                <nav class="collapse">
                                    <ul class="nav nav-pills" id="mainNav">
                                        <li>
                                            <a class="nav-link {{ $tittle === 'Home' ? 'active' : '' }}" href="{{route('home')}}">
                                                Home
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link  {{ $tittle === 'Cek Rekomendasi' ? 'active' : '' }}" href="{{route('cekrekomendasi')}}">
                                                Cek Rekomendasi
                                            </a>
                                        </li>
                                        {{-- <li>
                                            <a class="nav-link" href="demo-restaurant-about.html">
                                                News
                                            </a>
                                        </li> --}}
                                        <li>
                                            <a class="nav-link {{ $tittle === 'About' ? 'active' : '' }}" href="{{route('about')}}">
                                                About
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link {{ $tittle === 'Contact' ? 'active' : '' }}" href="{{route('contact')}}">
                                                Contact
                                            </a>
                                        </li>
                                        <li class="d-lg-none">
                                            @guest
                                            {{-- <a href="{{ route('login') }}" class="btn btn-dark custom-btn-style-1 font-weight-semibold text-3 ws-nowrap ms-4 d-none d-lg-block"><span>Sign-in</span></a> --}}
                                            <a class="nav-link" href="{{route('login')}}">
                                                Sign-in
                                            </a>
                                            @endguest
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-column header-column-search justify-content-end align-items-center d-flex w-auto flex-row">
                    {{-- <a href="{{route('login')}}" class="btn btn-dark custom-btn-style-1 font-weight-semibold text-3 ws-nowrap ms-4 d-none d-lg-block"><span>Sign-in</span></a> --}}
                    <!-- Jika pengguna belum login -->
                @guest
                <a href="{{ route('login') }}" class="btn btn-dark custom-btn-style-1 font-weight-semibold text-3 ws-nowrap ms-4 d-none d-lg-block"><span>Sign-in</span></a>
                @endguest

                <!-- Jika pengguna sudah login -->
                @auth
                <div class="dropdown d-none d-lg-block">
                    <a href="#" class="btn btn-dark custom-btn-style-1 font-weight-semibold text-3 ws-nowrap ms-4" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="icon icon-user"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li>
                            <form id="logout-form" action="{{ route('destroy') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        </li>
                    </ul>
                </div>
                @endauth
{{--
                    <div class="header-nav-features header-nav-features-no-border">
                        <div class="header-nav-feature header-nav-features-search d-inline-flex">
                            <a href="#" class="header-nav-features-toggle text-decoration-none" data-focus="headerSearch" aria-label="Search">
                                <i class="icons icon-magnifier header-nav-top-icon text-4-5 text-color-dark text-color-hover-primary font-weight-bold top-3"></i>
                            </a>

                            <div class="header-nav-features-dropdown header-nav-features-dropdown-mobile-fixed border-radius-0" id="headerTopSearchDropdown">
                                <form role="search" action="page-search-results.html" method="get">
                                    <div class="simple-search input-group">
                                        <input class="form-control text-1" id="headerSearch" name="q" type="search" value="" placeholder="Search...">
                                        <button class="btn" type="submit" aria-label="Search">
                                            <i class="icons icon-magnifier header-nav-top-icon text-color-dark text-color-hover-primary top-2"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <a href="https://www.instagram.com" class="text-decoration-none text-color-dark text-color-hover-primary text-5 mx-4" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://www.tripadvisor.com/" class="text-decoration-none" target="_blank">
                        <img width="32" height="32" src="img/demos/restaurant/icons/tripadvisor.svg" alt="Tripadvisor Icon" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-dark svg-fill-color-hover-primary', 'fadeIn': false}" />
                    </a> --}}
                    <!-- Dropdown Menu for Authenticated Users -->
                    @auth
                    <div class="dropdown d-lg-none d-flex">
                        <a href="#" class="btn btn-dark font-weight-semibold text-3 ws-nowrap ms-4" id="userDropdownMobile" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="icon icon-user"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="userDropdownMobile">
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li>
                                <form id="logout-form-mobile" action="{{ route('destroy') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();">Logout</a>
                            </li>
                        </ul>
                    </div>
                    @endauth
                    <button class="btn header-btn-collapse-nav" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>
@section('js')
<script>
    const time = Date.now();
    const date = new Date(time);
    const currentDate = date.toString();
    document.getElementById("tanggalWaktu").innerHTML = currentDate;
    // var tw = new Date();
    // if (tw.getTimezoneOffset() == 0) (a=tw.getTime() + ( 7 *60*60*1000))
    // else (a=tw.getTime());
    // tw.setTime(a);
    // var tahun= tw.getFullYear ();
    // var hari= tw.getDay ();
    // var bulan= tw.getMonth ();
    // var tanggal= tw.getDate ();
    // var hariarray=new Array("Minggu,","Senin,","Selasa,","Rabu,","Kamis,","Jum'at,","Sabtu,");
    // var bulanarray=new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
    // document.getElementById("tanggalwaktu").innerHTML = hariarray[hari]+" "+tanggal+" "+bulanarray[bulan]+" "+tahun+" Jam " + ((tw.getHours() < 10) ? "0" : "") + tw.getHours() + ":" + ((tw.getMinutes() < 10)? "0" : "") + tw.getMinutes() + (" WIB ");
</script>
@endsection
