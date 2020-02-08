<!DOCTYPE html>
<html lang="en">

<head>
@include('layouts.css')
<title>Detail Siswa {{ $student->nama }}</title>
</head>

<body>
@include('layouts.sidebar')
  <div class="main-content">
    
@include('layouts.topbar')
  
  <!-- Header -->
  <div class="header pb-8 pt-5 pt-lg-5 d-flex align-items-center" style="min-height: 400px; background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-5 col-md-10">
          <h1 class="mt-2 text-light">Detail_Siswa</h1> 
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
            <table id="table-datatables">
              <thead>    
                <tr>   
                  <th>Data  diri</th>  
                  <th>:</th>  
                  <th>keterangan</th>  
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1. Nama</td>
                  <td>:</td>
                  <td>{{ $student->nama }}</td>
                </tr>
                <tr>
                  <td>2. email</td>
                  <td>:</td>
                  <td>{{ $student->email }}</td>
                </tr>
                <tr>
                  <td>3. NIS</td>
                  <td>:</td>
                  <td>{{ $student->nis }}</td>
                </tr>
                <tr>
                  <td>4. Cabang</td>
                  <td>:</td>
                  <td>{{ $student->master_id }}</td>
                </tr>
                <tr>
                  <td>5. Alamat</td>
                  <td>:</td>
                  <td>{{ $student->alamat }}</td>
                </tr>
                <tr>
                  <td>6. Kelas</td>
                  <td>:</td>
                  <td>{{ $student->kelas }}</td>
                </tr>
                <tr>
                  <td>7. Jenjang</td>
                  <td>:</td>
                  <td>{{ $student->jenjang }}</td>
                </tr>
                <tr>
                  <td>8. Biaya Pendaftaran</td>
                  <td>:</td>
                  <td>Rp {{ number_format($student->biaya_daftar,0) }}</td>
                </tr> 
                <tr>
                  <td>9. Biaya</td>
                  <td>:</td>
                  <td>Rp {{ number_format($student->biaya,0) }}</td>
                </tr> 
              </tbody>
            </table>
          
            </div>
          </div>
                  <a href="{{ $student->id }}/edit" class="btn btn-primary">Ubah</a>
                  <a href="{{ url('payments/create') }}" class="btn btn-success">Bayar Angsuran</a>
                  <a href="{{ url('students') }}" class="card-link text-primary"><i class="fa fa-angle-left"></i>Kembali</a>
      </div>
    </div>
  </div>
  @include('layouts.footer')
@include('layouts.javascript')
<script type="text/javascript">
  
      $(document).ready(function () {
          $('#table-datatables2').DataTable({
              dom: 'Brti',
              buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
          });
      });
</script>
</body>
</html>