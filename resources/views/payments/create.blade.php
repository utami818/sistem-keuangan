<!DOCTYPE html>
<html lang="en">

<head>
@include('layouts.css')
<title>Form Angsuran Siswa</title>
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
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Form Angsuran Siswa</h1>
            <p class="text-white mt-0 mb-5">Isilah data dibawah ini dengan benar, Isi data yang harus diisi, tinggalkan yang terisi otomatis seperti "NIS"!</p>
          </div>
        </div>
      </div>
    </div>
      <!-- Card stars -->
    <div class="container-fluid mt--9">
      <div class="row">
        <div class="col-xl-8 order-xl-2 mb-7 mb-xl-8"> 
            <div class="card" style="background-color:rgba(255,255,255,0.6)">
                <div class="card-body">
                        <div class="text-dark text-center mt-2 mb-3"><h3>Masukkan data</h3><hr></div>      
                    <form method="post" action="/payments">
                      @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nis</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('nis') is-invalid @enderror" placeholder="masukkan NIS" id="nis" name="nis" value="{{ old('nis') }}">
                                @error('nis')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Biaya</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('biaya') is-invalid @enderror" placeholder="masukkan nominal biaya" id="biaya" name="biaya" value="{{ old('saldo') }}">
                                @error('biaya')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Angsuran</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('angsuran') is-invalid @enderror" placeholder="masukkan nominal angsuran" id="angsuran" name="angsuran" value="{{ old('angsuran') }}">
                                @error('angsuran')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Saldo</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" placeholder="saldo otomatis terpotong" id="saldo" name="saldo" value="{{ old('saldo') }}">
                                @error('angsuran')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    <button type="submit" class="btn btn-success">Bayar</button>
                    </form>
                  <a href="{{ url('payments') }}" class="card-link text-primary"><i class="fa fa-angle-left"></i>Kembali</a>
                </div>
          </div>
      </div>
    </div>
  </div>
  @include('layouts.footer')
@include('layouts.javascript')
</body>
</html>