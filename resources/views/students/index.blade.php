<!DOCTYPE html>
<html lang="en">

<head>
@include('layouts.css')
<title>Data Siswa</title>
</head>

<body>
@include('layouts.sidebar')
  <div class="main-content">
    
@include('layouts.topbar')
  
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-5 d-flex align-items-center" style="min-height: 300px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
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
                <h1 class="mt-3 text-dark">Daftar Data Siswa</h1>
                <form action="{{ url('query') }}" method="GET" class="form-inline my-2 my-lg-0">
                    <div class="row">
                          <div class="input-field col s12">
                          <input class="form-control mr-sm-1 validate" type="search" placeholder="Search" aria-label="Search" name="q">
                          </div>
                          <button type="submit" class="btn btn-flat accent-3 waves-effect waves-light white-text"><i class="material-icons right">cari</i></button>
                    </div>
                </form>
                <form action="{{ url('query') }}" method="GET" class="form-inline my-2 my-lg-0">
                    <div class="row">
                          <div class="input-field col s12">
                          <input class="form-control mr-sm-1 validate" type="date" placeholder="Search" aria-label="Search" name="search">
                          </div>
                          <button type="submit" class="btn btn-flat accent-3 waves-effect waves-light white-text"><i class="material-icons right">cari</i></button>
                    </div>
                    </form>
                <a href="/students/create" class="btn btn-outline-primary my-3"><i class="fas fa-plus"></i> Tambah Data Siswa</a>        
                @if (session('status'))
                  <div class="alert alert-success">
                      {{ session('status') }}
                  </div>
                @endif 
                  <ul class="list-group">
                  <div class="table-responsive">
                          <table id="table-datatables" class="table table-bordered table-striped table-hover table-condensed tfix">
                              <thead class="thead bg-dark text-light"align="center" >
                                <tr>
                                    <th>#</th>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>Nama Cabang</th>
                                    <th>Biaya Penhaftaran</th>
                                    <th>Tanggal</th>
                                    <th>MENU</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $data)
                                <tr>
                                    <td></td>
                                    <td>{{ $data->nis }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->nama_cabang }}</td>
                                    <td>Rp {{ number_format($data->biaya_daftar,0) }}</td>
                                    <td>{{ $data->created_at }}</td>
                                    <td> 
                                      <a href="/students/{{ $data->id }}" class="badge badge-primary badge-info">detail</a>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                  <td></td>
                                  <td><b><i>Total Pembayaran</i></b></td>
                                  <td></td>
                                  <td></td>
                                  <td><b><i>Rp {{ number_format($totals,0) }}</i></b></td>
                                  <td></td>
                                  <td></td>
                                </tr>
					                  </tbody>
				                  </table>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="badge badge-primary badge-pill">TOTAL SISWA: {{ $total }}</span>  
                        </li>
                    </ul>
                    <a href="{{ url('home') }}" class="card-link text-primary"><i class="fa fa-angle-left"></i>Kembali</a> 
                </div>
          </div>
      </div>
    </div>
  </div>
  @include('layouts.footer')
@include('layouts.javascript')
</body>
</html>