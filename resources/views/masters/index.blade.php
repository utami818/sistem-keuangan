<!DOCTYPE html>
<html lang="en">

<head>
@include('layouts.css')
<title>Airlangga Cabang</title>
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
                <h1 class="mt-3 text-dark">Daftar Data Cabang</h1>
                <a href="{{ url('masters/create') }}" class="btn btn-outline-primary my-3"><i class="fas fa-plus"></i> Tambah Data Cabang</a>        
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
                                    <th>Kode Cabang</th>
                                    <th>Nama Cabang</th>
                                    <!-- <th>email Cabang</th> -->
                                    <th>Tanggal</th>
                                    <th>MENU</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no= 0;?>
                                @foreach($masters as $data)
                                <?php $no++ ;?>
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->nama_cabang }}</td>
                                    <!-- <td></td> -->
                                    <td>{{ $data->created_at }}</td>
                                    <td> 
                                    <form action="masters/{{ $data->no_urut }}" method="post">
                                      @method('delete')
                                      @csrf
                                      <button type="submit" class="badge badge-danger badge-info">Hapus</button>
                                    </form>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                  <td></td>
                                  <td><b><i>Total Cabang</i></b></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                </tr>
					                  </tbody>
				                  </table>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="badge badge-primary badge-pill"></span>  
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