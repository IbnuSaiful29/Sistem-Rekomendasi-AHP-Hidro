@extends('admin.layout-admin.main')

@section('contents')
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Dashboard</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- ROW-1 -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                            <div class="card bg-primary img-card box-primary-shadow">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="text-white">
                                            <h2 class="mb-0 number-font">{{$count_data_user}}</h2>
                                            <p class="text-white mb-0">Total Users </p>
                                        </div>
                                        <div class="ms-auto"> <i class="fa fa-user-o text-white fs-30 me-2 mt-2"></i> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                            <div class="card bg-secondary img-card box-secondary-shadow">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="text-white">
                                            <h2 class="mb-0 number-font">{{$count_data_histori}}</h2>
                                            <p class="text-white mb-0">Histori Cek Rekomendasi</p>
                                        </div>
                                        <div class="ms-auto"> <i class="fa fa-list text-white fs-30 me-2 mt-2"></i> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                            <div class="card  bg-success img-card box-success-shadow">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="text-white">
                                            <h2 class="mb-0 number-font">{{$count_data_village}}</h2>
                                            <p class="text-white mb-0">Data Desa</p>
                                        </div>
                                        <div class="ms-auto"> <i class="fa fa-codepen text-white fs-30 me-2 mt-2"></i> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                            <div class="card bg-info img-card box-info-shadow">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="text-white">
                                            <h2 class="mb-0 number-font">{{$count_data_contact}}</h2>
                                            <p class="text-white mb-0">Total Pesan</p>
                                        </div>
                                        <div class="ms-auto"> <i class="fa fa-envelope-o text-white fs-30 me-2 mt-2"></i> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ROW-1 END -->

            <!-- ROW-2 -->
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Sales Analytics</h3>
                        </div>
                        <div class="card-body">
                            <div class="d-flex mx-auto text-center justify-content-center mb-4">
                                <div class="d-flex text-center justify-content-center me-3"><span
                                        class="dot-label bg-primary my-auto"></span>Total Sales</div>
                                <div class="d-flex text-center justify-content-center"><span
                                        class="dot-label bg-secondary my-auto"></span>Total Orders</div>
                            </div>
                            <div class="chartjs-wrapper-demo">
                                <canvas id="transactions" class="chart-dropshadow"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- COL END -->
            </div>
            <!-- ROW-2 END -->
        </div>
        <!-- CONTAINER END -->
    </div>
</div>
@endsection

