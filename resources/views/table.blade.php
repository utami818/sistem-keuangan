<!DOCTYPE html>
<html lang="en">

<head>
@include('layouts.css')
</head>

<body>
@include('layouts.sidebar')
  <div class="main-content">
    
@include('layouts.topbar')
  
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-md-8" style="background-color: #022c75">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Dark table -->
                <div class="row mt-5">
                    <div class="col">
                        <div class="card bg-default shadow">
                            <div class="card-header bg-transparent border-0">
                            <h3 class="text-white mb-0">Data Siswa</h3>
                            </div>
                                <div class="table-responsive">
                                    <table class="table align-items-center table-dark table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">id</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>utami</td>
                                                <td>
                                                <button class="btn btn-primary" type="submit">Detail</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <!-- <table class="table align-items-center table-dark table-flush">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Kode kelas</th>
                                        <th scope="col">Nomor Urut</th>
                                        <th scope="col">NIS</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Kelas</th>
                                        <th scope="col">Jenjang</th>
                                        <th scope="col">Biaya</th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>01</td>
                                        <td>namaku</td>
                                        <td>1</td>
                                        <td>001</td>
                                        <td>1001</td>
                                        <td>karang mojo japoh jenar sragen</td>
                                        <td>5</td>
                                        <td>SD</td>
                                        <td>2.000.000</td>
                                    </tr>
                                    </tbody>
                                </table> -->
                                </div>
                            
                        </div>
                    </div>
                    
                </div>

      <!-- Footer -->
            </div>
            <!-- <form action="">
                <button type="button" class="btn btn-outline-success" data-toggle="button" aria-pressed="false">
                Tambah Siswa
                </button>
            </form> -->
        </div> 
    </div>
    
@include('layouts.footer')
    </div>
  </div>
@include('layouts.javascript')
</body>

</html>