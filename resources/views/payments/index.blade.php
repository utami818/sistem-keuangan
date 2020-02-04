<!DOCTYPE html>
<html lang="en">

<head>
@include('layouts.css')
<title>Data Angsuran Siswa</title>
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
            <h1 class="display-2 text-white">Data Angsuran Siswa</h1>
            <p class="text-white mt-0 mb-5"></p>
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
                        <div class="text-dark text-center mt-2 mb-3"><h3>Daftar Pembayaran</h3><hr></div> 
                        <form action="{{ url('data') }}" method="GET" class="form-inline my-2 my-lg-0">
                            <div class="row">
                                  <div class="input-field col s12">
                                  <input class="form-control mr-sm-2 validate" type="search" placeholder="Cari Nis Siswa" aria-label="Search" name="q">
                                  </div>
                                  <button type="submit" class="btn btn-flat accent-3 waves-effect waves-light white-text"><i class="material-icons right">cari</i></button>
                            </div>
                        </form> 
                        <form action="{{ url('data') }}" method="GET" class="form-inline my-2 my-lg-0">
                          <div class="row">
                                <div class="input-field col s12">
                                <input class="form-control mr-sm-1 validate" type="date" placeholder="Search" aria-label="Search" name="search">
                                </div>
                                <button type="submit" class="btn btn-flat accent-3 waves-effect waves-light white-text"><i class="material-icons right">cari</i></button>
                          </div>
                        </form>    
                        <a href="/payments/create" class="btn btn-outline-primary my-3"><i class="fas fa-plus"></i> Pembayaran</a>        
                @if (session('status'))
                  <div class="alert alert-success">
                      {{ session('status') }}
                  </div>
                @endif
                  @if(count($payments))
                      <div class="table-responsive">
                          <table id="" class="table table-bordered table-striped table-hover table-condensed tfix">
                              <thead class="thead bg-dark text-light"align="center" >
                                <tr>
                                    <td>NIS</td>
                                    <td>Nama</td>
                                    <td>Email</td>
                                    <td>Kelas</td>
                                    <td>jenjang</td>
                                    <td>Alamat</td>
                                    <td>Biaya</td>
                                    <td>Angsuran</td>
                                    <td>Saldo</td>
                                    <td>Tanggal</td>
                                    <td>MENU</td>
                                </tr>
                            </thead>
                            @foreach($payments as $payment)
                            <tbody>
                                <tr>
                                    <td>{{ $payment->nis }}</td>
                                    <td>{{ $payment->nama }}</td>
                                    <td>{{ $payment->email }}</td>
                                    <td>{{ $payment->kelas }}</td>
                                    <td>{{ $payment->jenjang }}</td>
                                    <td>{{ $payment->alamat }}</td>
                                    <td>Rp {{ number_format($payment->biaya,0) }}</td>
                                    <td>Rp {{ number_format($payment->angsuran,0) }}</td>
                                    <td>Rp {{ number_format($payment->saldo,0) }}</td>
                                    <td>{{ $payment->created_at }}</td>
                                    <td> 
                                      <a href="/payments/{{ $payment->id }}" class="badge badge-primary badge-info">detail</a>
                                    </td>
                                </tr>
                            @endforeach
                                <tr>
                                  <td></td>
                                  <td>Total Angsuran</td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td>Rp {{ number_format($total,0) }}</td>
                                  <td></td>
                                </tr>
                            </tbody>    
                        </table>
                    </div>
                  @else
            <div class="alert alert-warning">
                <i class="fa fa-exclamation-triangle"></i> Data Siswa tidak tersedia
            </div>
        @endif 
                  <ul class="list-group">
                    <!-- @foreach( $payments as $payment )
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $payment->nis }}
                            <span class="badge badge-primary badge-pill">{{ $payment->nis }}</span>
                            <a href="/payments/{{ $payment->id }}" class="badge badge-primary badge-info">detail</a>
                        </li>
                    @endforeach -->
                    </ul> 
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