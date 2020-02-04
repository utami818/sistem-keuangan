<!DOCTYPE html>
<html lang="en">

<head>
@include('layouts.css')
<title>Data siswa</title>
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
            <h1 class="mt-3 text-dark">Data Siswa</h1>
            @if (count($hasil))
              <div class="card-panel green white-text"></div>
                  <div class="row">
                    <div class="col s12">
                    @foreach($hasil as $data)
                    <h5>Hasil Pencarian Data:{{ $data->nis }}</h5>
                        <div class="divider"></div>
                        <p>{!!substr($data->isi,0,200)!!}</p> 
                        @endforeach   
                        <div class="table-responsive">
                          <table class="table table-bordered table-striped table-hover table-condensed tfix">
                              <thead class="thead bg-dark text-light"align="center" >
                                <tr>
                                    <td><b>#</b></td>
                                    <td><b>NIS</b></td>
                                    <td><b>Nama</b></td>
                                    <td><b>Tanggal</b></td>
                                    <td colspan="2"><b>MENU</b></td>
                                </tr>
                            </thead>
                         @foreach($hasil as $data)
                                <tr>
                                    <td></td>
                                    <td>{{ $data->nis }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->created_at }}</td>
                                    <td> 
                                      <a href="/payments/{{ $data->id }}" class="badge badge-primary badge-info">detail</a>
                                    </td>
                                </tr>
                          @endforeach
                        </table>
                    </div>
                  </div>
              </div>

              {{ $hasil->render() }}

            @else
              <div class="card-panel red darken-3 white-text text-danger">Oops.. Data <b>{{$query}}</b> Tidak Ditemukan</div>
            @endif  
            @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
            @endif 
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