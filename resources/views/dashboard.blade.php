@include('partials.header')

@if(auth() -> User() -> role == 'admin' || auth() -> User() -> role =='kasir')
<div class="container-fluid">
    <div class="position-absolute top-50 start-50 translate-middle">
        <div class="center">
            <center>
                <span style="font-size:45px; margin-bottom:-20px"><b>Selamat Datang<br> Di Laundry
                        {{auth() -> User() -> outlet -> nama}}</b></span><br>
            </center>
        </div>
    </div>
</div>
@endif
@if(auth()->User() -> role == 'owner')
<div class="container">
    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Data Member</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $member }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Data Paket</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $paket }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-bus-simple fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Outlet
                            </div>
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $outlet }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data User
                            </div>
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $User }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@include('partials.footer')
