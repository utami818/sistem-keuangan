<!DOCTYPE html>
<html lang="en">
<head>
@include('layouts.css')
<title>Airlangga Cabang {{ Auth::user()->name }}</title>
</head>
<body>
@include('layouts.sidebar')
  <div class="main-content">    
@include('layouts.topbar') 
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-md-8" style="background-color: #022c75">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">ADMIN {{ Auth::user()->name }}</h5>
                      <span class="h2 font-weight-bold mb-0"><a href="#">Data Admin</a></span>
                     
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-nowrap"></span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">KASIR</h5>
                      <span class="h2 font-weight-bold mb-0"><a href="{{ url('payments') }}">Data Angsuran</a></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-chart-pie"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-nowrap"></span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">SISWA</h5>
                      <span class="h2 font-weight-bold mb-0"><a href="{{ url('students') }}">Data Siswa</a></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-nowrap"></span>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
     @include('layouts.footer')
    </div>
  </div>
@include('layouts.javascript')
</body>

</html>