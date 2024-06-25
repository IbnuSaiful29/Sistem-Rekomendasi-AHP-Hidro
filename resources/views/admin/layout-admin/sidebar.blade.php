<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="index.html">
                <img src="assets/images/brand/logo.png" class="header-brand-img desktop-logo" alt="logo">
                <img src="assets/images/brand/logo-1.png" class="header-brand-img toggle-logo"
                    alt="logo">
                <img src="assets/images/brand/logo-2.png" class="header-brand-img light-logo" alt="logo">
                <img src="assets/images/brand/logo-3.png" class="header-brand-img light-logo1"
                    alt="logo">
            </a>
            <!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg"
                    fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>
            @if (Auth::user()->role == 'superadmin')
                <ul class="side-menu">
                    <li class="sub-category">
                        <h3>Main</h3>
                    </li>
                    <li>
                        <a class="side-menu__item {{ $tittle === 'Dashboard' ? 'active' : '' }}" data-bs-toggle="slide" href="{{route('dashboard')}}"><i
                                class="side-menu__icon fe fe-home"></i><span
                                class="side-menu__label">Dashboard</span></a>
                    </li>
                    <li class="sub-category">
                        <h3>Data Management</h3>
                    </li>
                    <li>
                        <a class="side-menu__item {{ $tittle === 'Data User' ? 'active' : '' }}" data-bs-toggle="slide" href="{{route('user')}}"><i
                                class="side-menu__icon fe fe-user"></i><span
                                class="side-menu__label">User</span></a>
                    </li>
                    <li>
                        <a class="side-menu__item {{ $tittle === 'Data Criteria' ? 'active' : '' }}" data-bs-toggle="slide" href="{{route('criteria')}}"><i
                                class="side-menu__icon fe fe-user"></i><span
                                class="side-menu__label">Criteria</span></a>
                    </li>
                    <li>
                        <a class="side-menu__item {{ $tittle === 'Data Alternative' ? 'active' : '' }}" data-bs-toggle="slide" href="{{route('alternative')}}"><i
                                class="side-menu__icon fe fe-user"></i><span
                                class="side-menu__label">Alternative</span></a>
                    </li>
                    <li class="sub-category">
                        <h3>SEO</h3>
                    </li>
                    <li>
                        <a class="side-menu__item {{ $tittle === 'Data Alternative' ? 'active' : '' }}" data-bs-toggle="slide" href="{{route('alternative')}}"><i
                                class="side-menu__icon fe fe-book-open"></i><span
                                class="side-menu__label">News</span></a>
                    </li>
                    <li class="sub-category">
                        <h3>AHP</h3>
                    </li>
                    @php
                        // Determine if any of the submenu items are active
                        $isCriteriaMenuActive = in_array($tittle, ['Perbandingan Kriteria', 'Rangking Kriteria']);
                    @endphp

                    <li class="slide {{ $isCriteriaMenuActive ? '' : '' }}">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                            <i class="side-menu__icon fe fe-slack"></i>
                                <span class="side-menu__label">Perbandingan Kriteria</span>
                            <i class="angle fe fe-chevron-right"></i>
                        </a>
                        <ul class="slide-menu">
                            <li>
                                <a href="{{ route('pairwiseComparisonCriteria') }}" class="slide-item {{ $tittle === 'Perbandingan Kriteria' ? 'active' : '' }}">
                                    Perbandingan Berpasangan
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('rangkingCriteria') }}" class="slide-item {{ $tittle === 'Rangking Kriteria' ? 'active' : '' }}">
                                    Rangking Kriteria
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                class="side-menu__icon fe fe-slack"></i><span
                                class="side-menu__label">Perbandingan Alternatif</span><i
                                class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu">
                            <li><a href="{{route('pairwiseComparisonAlternative')}}" class="slide-item {{ $tittle === 'Perbandingan Alternatif' ? 'active' : '' }}">Kriteria Alternatif</a></li>
                            <li class="sub-slide">
                                <a class="sub-side-menu__item" href="javascript:void(0)" data-bs-toggle="sub-slide"><span class="sub-side-menu__label">Rangking ALternatif - Kriteria</span><i class="sub-angle fe fe-chevron-right"></i></a>
                                <ul class="sub-slide-menu">
                                    @php
                                        $menusKriteria = DB::select('SELECT * FROM kriteria');
                                    @endphp
                                    @foreach ($menusKriteria as $menuKriteria)
                                        <li><a href="{{route('rangkingCriteriaAlternative', [$menuKriteria->id])}}" class="sub-slide-item {{ ($tittle === 'Rangking Alternatif - ' . $menuKriteria->nama_kriteria) ? 'active' : '' }}">{{ $menuKriteria->nama_kriteria }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="{{route('rangkingCriteriaAlternativeAll')}}" class="slide-item {{ $tittle === 'Rangking Alternatif' ? 'active' : '' }}">Rangking Alternatif</a></li>
                        </ul>
                    </li>
                </ul>
            @endif
            @if (Auth::user()->role == 'pakar')
                <ul class="side-menu">
                    <li class="sub-category">
                        <h3>Main</h3>
                    </li>
                    <li>
                        <a class="side-menu__item {{ $tittle === 'Dashboard' ? 'active' : '' }}" data-bs-toggle="slide" href="{{route('dashboard')}}"><i
                                class="side-menu__icon fe fe-home"></i><span
                                class="side-menu__label">Dashboard</span></a>
                    </li>
                    <li class="sub-category">
                        <h3>Data Management</h3>
                    </li>
                    <li>
                        <a class="side-menu__item {{ $tittle === 'Data Criteria' ? 'active' : '' }}" data-bs-toggle="slide" href="{{route('criteria')}}"><i
                                class="side-menu__icon fe fe-user"></i><span
                                class="side-menu__label">Criteria</span></a>
                    </li>
                    <li>
                        <a class="side-menu__item {{ $tittle === 'Data Alternative' ? 'active' : '' }}" data-bs-toggle="slide" href="{{route('alternative')}}"><i
                                class="side-menu__icon fe fe-user"></i><span
                                class="side-menu__label">Alternative</span></a>
                    </li>
                    <li class="sub-category">
                        <h3>AHP</h3>
                    </li>
                    @php
                        // Determine if any of the submenu items are active
                        $isCriteriaMenuActive = in_array($tittle, ['Perbandingan Kriteria', 'Rangking Kriteria']);
                    @endphp

                    <li class="slide {{ $isCriteriaMenuActive ? '' : '' }}">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                            <i class="side-menu__icon fe fe-slack"></i>
                                <span class="side-menu__label">Perbandingan Kriteria</span>
                            <i class="angle fe fe-chevron-right"></i>
                        </a>
                        <ul class="slide-menu">
                            <li>
                                <a href="{{ route('pairwiseComparisonCriteria') }}" class="slide-item {{ $tittle === 'Perbandingan Kriteria' ? 'active' : '' }}">
                                    Perbandingan Berpasangan
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('rangkingCriteria') }}" class="slide-item {{ $tittle === 'Rangking Kriteria' ? 'active' : '' }}">
                                    Rangking Kriteria
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                class="side-menu__icon fe fe-slack"></i><span
                                class="side-menu__label">Perbandingan Alternatif</span><i
                                class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu">
                            <li><a href="{{route('pairwiseComparisonAlternative')}}" class="slide-item {{ $tittle === 'Perbandingan Alternatif' ? 'active' : '' }}">Kriteria Alternatif</a></li>
                            <li class="sub-slide">
                                <a class="sub-side-menu__item" href="javascript:void(0)" data-bs-toggle="sub-slide"><span class="sub-side-menu__label">Rangking ALternatif - Kriteria</span><i class="sub-angle fe fe-chevron-right"></i></a>
                                <ul class="sub-slide-menu">
                                    @php
                                        $menusKriteria = DB::select('SELECT * FROM kriteria');
                                    @endphp
                                    @foreach ($menusKriteria as $menuKriteria)
                                        <li><a href="{{route('rangkingCriteriaAlternative', [$menuKriteria->id])}}" class="sub-slide-item {{ ($tittle === 'Rangking Alternatif - ' . $menuKriteria->nama_kriteria) ? 'active' : '' }}">{{ $menuKriteria->nama_kriteria }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="{{route('rangkingCriteriaAlternativeAll')}}" class="slide-item {{ $tittle === 'Rangking Alternatif' ? 'active' : '' }}">Rangking Alternatif</a></li>
                        </ul>
                    </li>
                </ul>
            @endif
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg></div>
        </div>
    </div>
    <!--/APP-SIDEBAR-->
</div>
