<!DOCTYPE html>
<html lang="en">

<head>
@include('layouts.css')
<title>Form Data Siswa</title>
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
            <h1 class="display-2 text-white">Form Data Siswa</h1>
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
                    <form method="post" action="/students">
                      @csrf
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="masukkan nama" name="nama" value="{{ old('nama') }}">
                            @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                          </div>
                        <div class="form-group">
                            <label for="master_id">Cabang</label>
                            <select class="form-control" name="master_id">
                              <option selected="" disabled="">Pilih Cabang</option>
                              @foreach($masters as $m)
                              <option>{{ $m->id }}</option>
                              @endforeach
                            </select>
                          </div>
                        <div class="form-group">
                            <label for="user_id">Cabang</label>
                            <select class="form-control" name="user_id">
                              <option selected="" disabled="">Admin</option>
                              @foreach($user as $u)
                              <option>{{ $u->id }}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="masukkan email" name="email" value="{{ old('email') }}">
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                          </div>
                          <!-- <div class="form-group">
                            <label for="nis">NIS</label>
                            <input type="text" class="form-control" id="nis" placeholder="nis otomatis" name="nis">
                          </div> -->
                          <div class="form-group">
                            <label for="kelas">Kelas</label>
                          <input type="text" class="form-control @error('kelas') is-invalid @enderror" id="kelas" placeholder="masukkan kelas" name="kelas" value="{{ old('kelas') }}">
                            @error('kelas')<div class="invalid-feedback">{{ $message }}</div>@enderror
                          </div>
                          <div class="form-group">
                            <label for="jenjang">Jenjang</label>
                            <input type="text" class="form-control @error('jenjang') is-invalid @enderror" id="jenjang" placeholder="masukkan jenjang" name="jenjang" value="{{ old('jenjang') }}">
                            @error('jenjang')<div class="invalid-feedback">{{ $message }}</div>@enderror
                          </div>
                          <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="masukkan alamat" name="alamat" value="{{ old('alamat') }}">
                            @error('alamat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                          </div>
                          <div class="form-group">
                            <label for="biaya">Biaya</label>
                            <input type="text" class="form-control @error('biaya') is-invalid @enderror" id="biaya" placeholder="masukkan biaya" name="biaya" value="{{ old('biaya') }}">
                            @error('biaya')<div class="invalid-feedback">{{ $message }}</div>@enderror
                          </div>
                          <div class="form-group">
                            <label for="biaya_daftar">Biaya Pendaftaran</label>
                            <input type="text" class="form-control @error('biaya_daftar') is-invalid @enderror" id="biaya_daftar" placeholder="masukkan biaya" name="biaya_daftar" value="{{ old('biaya_daftar') }}">
                            @error('biaya_daftar')<div class="invalid-feedback">{{ $message }}</div>@enderror
                          </div>
                          <!-- <div class="form-group">
                            <label for="saldo">Saldo</label>
                            <input type="text" class="form-control @error('saldo') is-invalid @enderror" id="saldo" placeholder="masukkan saldo" name="saldo" value="{{ old('saldo') }}">
                            @error('saldo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                          </div> -->
                    <button type="submit" class="btn btn-success">Tambah Data</button>
                    </form>
                  <a href="{{ url('students') }}" class="card-link text-primary"><i class="fa fa-angle-left"></i>Kembali</a>
                </div>
          </div>
      </div>
    </div>
  </div>
  @include('layouts.footer')
@include('layouts.javascript')
</body>
</html>