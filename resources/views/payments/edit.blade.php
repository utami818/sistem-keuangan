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
      <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4 background-color:rgba(255,255,255,0.6)"> 
                        <div class="text-dark text-center mt-2 mb-3"><h3>Masukkan Angsuran</h3><hr></div>      
                    <form method="post" action="/payments/{{ $payment->id }}">
                    @method('patch')
                      @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nis</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('nis') is-invalid @enderror" placeholder="masukkan NIS" id="nis" name="nis" value="{{ $payment->nis }}">
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
              <div class="text-center">
                <div>
                  <i class="ni education_hat mr-2"></i>
                </div>
              </div>  
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
              </div>
              <div class="card-body">
                <div class="text-dark text-center mt-2 mb-3"><h3>Data Siswa</h3><hr></div>
                  <table id="table-datatables">
                    <thead>
                      <tr>
                        <th>Data diri</th>
                        <th>:</th>
                        <th>Keterangan</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>   
                          <td>1. Nama</td>
                          <td>:</td>
                          <td>{{ $payment->nama }}</td>
                        </tr>
                        <tr>
                          <td>2. Email</td>
                          <td>:</td>
                          <td>{{ $payment->email }}</td>
                        </tr>
                        <tr>
                          <td>3. NIS</td>
                          <td>:</td>
                          <td>{{ $payment->nis }}</td>
                        </tr>
                        <tr>
                          <td>4. Alamat</td>
                          <td>:</td>
                          <td>{{ $payment->alamat }}</td>
                        </tr>
                        <tr>
                          <td>5. Kelas</td>
                          <td>:</td>
                          <td>{{ $payment->kelas }}</td>
                        </tr>
                        <tr>
                          <td>6. Jenjang</td>
                          <td>:</td>
                          <td>{{ $payment->jenjang }}</td>
                        </tr>
                        <tr>
                          <td>7. Biaya Pendaftaran</td>
                          <td>:</td>
                          <td>Rp {{ number_format($payment->biaya_daftar,0) }}</td>
                        </tr>
                        <tr>
                          <td>8. Saldo</td>
                          <td>:</td>
                          <td>Rp {{ number_format($payment->saldo,0) }}</td>
                        </tr>
                    </tbody>
                  </table>
                  <div class="table-responsive">
                      <table id="table-datatables2" class="table table-bordered table-striped table-hover table-condensed tfix">
                          <thead class="thead bg-dark text-light"align="center" >
                            <tr>
                                <td>#</td>
                                <td>NIS</td>
                                <td>Biaya</td>
                                <td>Angsuran</td>
                                <td>Saldo</td>
                                <td>Tanggal</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($detail as $data)
                            <tr>
                                <td></td>
                                <td>{{ $data->nis }}</td>
                                <td>Rp {{ number_format($data->biaya,0) }}</td>
                                <td>Rp {{ number_format($data->angsuran,0) }}</td>
                                <td>Rp {{ number_format($data->saldo,0) }}</td>
                                <td>{{ $data->created_at }}</td>
                            </tr>
                        @endforeach
                            <tr>
                              <td></td>
                              <td>Total Angsuran</td>
                              <td></td>
                              <td></td>
                              <td>Rp {{ number_format($total,0) }}</td>
                              <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                  <ul class="list-group">
                    </ul> 
                  <a href="{{ url('payments') }}" class="card-link text-primary"><i class="fa fa-angle-left"></i>Kembali</a>
              </div>
            </div>
          </div>
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