<!DOCTYPE html>
<html lang="en">

<head>
@include('layouts.css')
<title>Form Tambah Cabang</title>
</head>

<body>
@include('layouts.sidebar')
  <div class="main-content">
    
@include('layouts.topbar')
  
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-5 d-flex align-items-center" style="min-height: 500px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
    </div>
      <!-- Card stars -->
    <div class="container-fluid mt--9">
      <div class="row">
        <div class="col-xl-8 order-xl-2 mb-7 mb-xl-8"> 
            <div class="card" style="background-color:rgba(255,255,255,0.6)">
                <div class="card-body">
                <div class="col-lg-7 col-md-10">
                    <h1 class="display-2 text-white">Form Cabang</h1>
                </div>
                        <div class="text-dark text-center mt-2 mb-3"><h3>Masukkan data</h3><hr></div>      
                    <form method="post" action="{{ url('masters') }}">
                      @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Cabang</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('nis') is-invalid @enderror" placeholder="masukkan Cabang" id="nama_cabang" name="nama_cabang" value="{{ old('nama_cabang') }}">
                                @error('nama_cabang')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                  <a href="{{ url('masters') }}" class="card-link text-primary"><i class="fa fa-angle-left"></i>Kembali</a>
                </div>
          </div>
      </div>
    </div>
  </div>
  @include('layouts.footer')
@include('layouts.javascript')
</body>
</html>