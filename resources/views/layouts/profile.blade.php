<!DOCTYPE html>
<html lang="en">
<head>
@include('layouts.css')
<title>Profile Airlangga</title>
</head>
<body>
@include('layouts.sidebar')
  <div class="main-content">    
@include('layouts.topbar')
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-5 d-flex align-items-center" style="min-height: 600px; background-image: url{{ asset('argon/assets/img/theme/profile-cover.jpg') }}; background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hello Admin Airlangga</h1>
            <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your work and manage your projects or assigned tasks</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--9">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2 pt-md-6">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="{{ asset('argon/assets/img/theme/airlangga.png') }}">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-0 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <a href="https://web.whatsapp.com/" class="btn btn-sm btn-default float-right">Message</a>
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    <div>
                      <span class="heading">22</span>
                      <span class="description">Tentor</span>
                    </div>
                    <div>
                      <span class="heading">10</span>
                      <span class="description"><a href="{{ url('/layouts/photo') }}">Photos</a></span>  
                    </div>
                    <div>
                      <span class="heading">5</span>
                      <span class="description">Cabang</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h3> 
                  <span class="font-weight-light">apa</span>
                </h3>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>Bimbel Airlangga - Zona Belajar Seru
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>Airlangga Education Center
                </div>
                <hr class="my-4" />
                <h3>Airlangga Edu-C</h3>
                <ul class="text-justify">
                  <ol><i class="fas fa-book"></i> Sarana Belajar Lengkap</ol>
                  <ol><i class="fas fa-wifi"></i> Free wifi 24 jam</ol>
                  <ol><i class="far fa-clock"></i> Pertemuan 3x-4x/minggu@90 menit</ol>
                  <ol><i class="fas fa-users"></i> Ruang Full AC dan Nyaman Maksimal 20 siswa tiap kelas</ol>
                  <ol><i class="fas fa-user-tie"></i> Metode belajar Mastering</ol>
                  <ol><i class="fas fa-chalkboard-teacher"></i> Dibimbing sampai bisa</ol>
                  <ol><i class="fal fa-lightbulb"></i> Training Motivasi & Mind Games</ol>
                  <ol><i class="fas fa-fingerprint"></i> Airlangga Analytic miolk sendiri</ol>
                  <ol><i class="fas fa-comment-dollar"></i>Biaya lebih hemat</ol>
                  <ol><i class="fas fa-umbrella"></i> Perlindungan Asuransi jiwa RP. 5.000.000 </ol>
                  <ol><i class="fas fa-unlock-alt"></i> Garansi naik kelas/lulus UNAS 100%</ol>
                </ul>
                <a href="#">Show more</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1 mb-7 mb-xl-8">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">My account</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="#" class="btn btn-sm btn-primary">About</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="Username" value="airlangga.pusat">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="airlangga.educ.pusat@gmail.com">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">About me</h6>
                <div class="pl-lg-4">
                  <div class="form-group">
                    <label>About Me</label>
                    <textarea rows="4" class="form-control form-control-alternative" placeholder="A few words about you ...">A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</textarea>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      @include('layouts.footer')
@include('layouts.javascript')
</body>
</html>