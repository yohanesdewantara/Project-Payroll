<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - Payroll BCA</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>


</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="{{ url('/home') }}">Payroll BCA</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>

        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <!-- <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button> -->
            </div>

        </form>


        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item align-self-center">
                <span class="text-white small"> {{ session('role', 'Guest') }}</span>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
                </ul>
            </li>

        </ul>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link" href="{{ url('home') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>


                        <li class="nav-item">
                            @if(session('role') === 'Super Admin' || session('role') === 'Admin')
                                <a class="nav-link" href="{{ url('/user_perusahaan') }}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                    Karyawan
                                </a>
                            @endif
                        </li>



                        <a class="nav-link" href="{{ url('/perusahaan') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
                            Perusahaan
                        </a>

                        <a class="nav-link" href="/jadwal_gaji">
                            <div class="sb-nav-link-icon"><i class="fas fa-money-bill"></i></div>
                            Jadwal & Penggajian
                        </a>


                        <li class="nav-item">
                            @if(session('role') !== 'Admin')
                                <a class="nav-link" href="/log_payroll">
                                    <div class="sb-nav-link-icon">
                                        <i class="fas fa-book"></i>
                                    </div>
                                    Log Payroll
                                </a>
                            @endif
                        </li>

                        </ul>

                    </div>
                </div>


            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">

                    </ol>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">
                                    Jumlah Karyawan : {{ $jumlah_user }} <!-- Menampilkan jumlah user -->
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link"
                                        href="{{ url('/user_perusahaan') }}">Detail</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">
                                    Jumlah Jabatan: {{ $jumlah_jabatan }}
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link"
                                        href="{{ url('/user_perusahaan') }}">Detail</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-12 col-md-12">
                            <div class="card mb-4">
                                <div class="card-header text-center">
                                    <strong>5 Gaji Tertinggi Karyawan</strong>
                                </div>
                                <div class="card-body">
                                    <!-- Grafik -->
                                    <div style="width: 100%; height: 400px;">
                                        <canvas id="gajiChart" style="width: 100%; height: 100%;"></canvas>
                                    </div>

                                    @if ($karyawanGajiTertinggi->isNotEmpty())
                                        <div class="mt-4">
                                            <p><strong>Nama:</strong> {{ $karyawanGajiTertinggi->first()->nama_user }}</p>
                                            <p><strong>Jabatan:</strong> {{ $karyawanGajiTertinggi->first()->jabatan }}</p>
                                            <p><strong>Gaji:</strong> Rp
                                                {{ number_format($karyawanGajiTertinggi->first()->gaji, 0, ',', '.') }}
                                            </p>
                                        </div>
                                    @else
                                        <p class="text-center">Belum ada data karyawan.</p>
                                    @endif
                                </div>
                            </div>
                        </div>



                        <!-- table user perusahaan -->
                        <div class="col-xl-12 col-md-12">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    Tabel karyawan
                                </div>
                                <div class="card-body">
                                    <table id="datatablesSimple">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Jabatan</th>
                                                <th>BANK</th>
                                                <th>Gaji</th>
                                                <th>Nomor Rekening</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Jabatan</th>
                                                <th>BANK</th>
                                                <th>Gaji</th>
                                                <th>Nomor Rekening</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach($user_perusahaan as $user)
                                                <tr>
                                                    <td>{{ $user->nama_user }}</td>
                                                    <td>{{ $user->jabatan }}</td>
                                                    <td>{{ $user->alamat }}</td>
                                                    <td>Rp {{ number_format($user->gaji, 0, ',', '.') }}</td>
                                                    <td>{{ $user->norek_user }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                    </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Payroll BCA</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms & Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>




    <script>
        window.onload = function () {
            const ctx = document.getElementById('gajiChart').getContext('2d');

            // Ambil data nama dan gaji dari variabel $karyawanGajiTertinggi
            const labels = @json($karyawanGajiTertinggi->pluck('nama_user'));  // Nama karyawan
            const data = @json($karyawanGajiTertinggi->pluck('gaji'));  // Gaji karyawan

            const chartData = {
                labels: labels,  // Nama karyawan
                datasets: [{
                    label: 'Gaji Karyawan',
                    data: data,  // Gaji karyawan
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            };

            const config = {
                type: 'bar',  // Tipe grafik bar
                data: chartData,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: '5 Karyawan dengan Gaji Tertinggi'
                        }
                    }
                }
            };

            new Chart(ctx, config);  // Inisialisasi chart
        };

    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('assets/demo/chart-bar-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

</html>
