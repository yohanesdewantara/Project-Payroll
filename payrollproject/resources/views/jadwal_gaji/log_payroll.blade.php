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

    <style>
        #bank {
            width: 250px;

            padding: 8px;

            font-size: 14px;

        }

        .form-select {
            max-width: 100%;

        }
    </style>

</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="{{ url('/user_perusahaan') }}">Payroll BCA</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>

        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">

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
                        <a class="nav-link" href="{{ url('/home') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>

                        <a class="nav-link" href="/user_perusahaan">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Karyawan
                        </a>

                        <a class="nav-link" href="/perusahaan">
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



                    </div>
                </div>

            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>

                <div class="container-fluid px-4">
                    <h1 class="mt-4">Logbook Payroll</h1>
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif


                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif



                    <form action="{{ route('jadwal_gaji') }}" method="GET">
                        <div class="row mb-3">

                        </div>

                    </form>
                    <!-- <div class="col-md-4">
                        <label for="bulan" class="form-label fw-bold">Filter Berdasarkan Bulan:</label>
                        <select name="bulan" id="bulan" class="form-select">
                            <option value="">-- Pilih Bulan --</option>
                            @foreach(range(1, 12) as $m)
                                <option value="{{ $m }}" {{ (request()->get('bulan') == $m) ? 'selected' : '' }}>
                                    {{ \Carbon\Carbon::create()->month($m)->translatedFormat('F') }}
                                </option>
                            @endforeach
                        </select>
                    </div> -->




                    <label for="perusahaan" class="form-label fw-bold">Saldo Perusahaan :</label>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            @if ($perusahaan)
                                <div class="alert alert-info">
                                    Saldo Perusahaan: Rp{{ number_format($perusahaan->saldo, 2, ',', '.') }}
                                </div>
                            @else
                                <div class="alert alert-warning">
                                    Perusahaan dengan ID 6 tidak ditemukan.
                                </div>
                            @endif
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Daftar Karyawan



                                        <a href="{{ route('jadwal_gaji.downloadPdf', ['bulan' => request()->get('bulan'), 'tahun' => request()->get('tahun')]) }}"
                                            class="btn btn-success float-end" style="margin-right: 10px;">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-box-arrow-down" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M3.5 10a.5.5 0 0 1-.5-.5v-8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 0 0 1h2A1.5 1.5 0 0 0 14 9.5v-8A1.5 1.5 0 0 0 12.5 0h-9A1.5 1.5 0 0 0 2 1.5v8A1.5 1.5 0 0 0 3.5 11h2a.5.5 0 0 0 0-1z" />
                                                <path fill-rule="evenodd"
                                                    d="M7.646 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V5.5a.5.5 0 0 0-1 0v8.793l-2.146-2.147a.5.5 0 0 0-.708.708z" />
                                            </svg>
                                            Cetak PDF
                                        </a>



                                    </h4>


                                </div>

                                <form action="{{ url('/log_payroll') }}" method="GET">
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="bulan" class="form-label fw-bold">Filter Berdasarkan
                                                Bulan:</label>
                                            <select name="bulan" id="bulan" class="form-select">
                                                <option value="">-- Pilih Bulan --</option>
                                                @foreach(range(1, 12) as $m)
                                                    <option value="{{ $m }}" {{ request()->get('bulan') == $m ? 'selected' : '' }}>
                                                        {{ \Carbon\Carbon::create()->month($m)->translatedFormat('F') }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="tahun" class="form-label fw-bold">Filter Berdasarkan
                                                Tahun:</label>
                                            <select name="tahun" id="tahun" class="form-select">
                                                <option value="">-- Pilih Tahun --</option>
                                                @foreach(range(2020, now()->year) as $year) <!-- Anda bisa mengatur rentang tahun sesuai kebutuhan -->
                                                    <option value="{{ $year }}" {{ request()->get('tahun') == $year ? 'selected' : '' }}>
                                                        {{ $year }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4 align-self-end">
                                            <button type="submit" class="btn btn-primary">Filter</button>
                                        </div>
                                    </div>
                                </form>



                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4>Daftar Karyawan</h4>
                                            </div>
                                            <div class="card-body">
                                                <!-- Tabel Karyawan atau hasil filter -->
                                                <table class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Nama</th>
                                                            <th>Bank</th>
                                                            <th>Gaji</th>
                                                            <th>Nomor Rekening</th>
                                                            <th>Status</th>
                                                            <th>Jadwal</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($user_perusahaan as $daf_user)
                                                            <tr>
                                                                <td>{{ $daf_user->id_user }}</td>
                                                                <td>{{ $daf_user->nama_user }}</td>
                                                                <td>{{ $daf_user->alamat }}</td>
                                                                <td>Rp{{ number_format($daf_user->gaji, 2, ',', '.') }}</td>
                                                                <td>{{ $daf_user->norek_user }}</td>
                                                                <td>{{ $daf_user->status }}</td>
                                                                <td>
                                                                    @if($daf_user->jadwal_gaji_tanggal)
                                                                        {{ \Carbon\Carbon::parse($daf_user->jadwal_gaji_tanggal)->isValid() ? \Carbon\Carbon::parse($daf_user->jadwal_gaji_tanggal)->format('d-m-Y') : 'Tanggal tidak valid' }}
                                                                        at {{ $daf_user->jadwal_gaji_jam ?? '---' }}
                                                                    @else
                                                                        'Belum Dijadwalkan'
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('assets/demo/chart-bar-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Cari semua tombol dengan class 'btn-delete'
            const deleteButtons = document.querySelectorAll('.btn-delete');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const userId = this.getAttribute('data-id');
                    const deleteUrl = this.getAttribute('data-url');

                    // SweetAlert2 pop-up
                    Swal.fire({
                        title: "Anda yakin?",
                        text: "Data karyawan ini akan dihapus secara permanen!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#d33",
                        cancelButtonColor: "#3085d6",
                        confirmButtonText: "Ya, hapus!",
                        cancelButtonText: "Batal"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Redirect ke URL delete
                            window.location.href = deleteUrl;
                        }
                    });
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Pilih Semua checkbox
            const selectAllCheckbox = document.getElementById('select_all');
            const userCheckboxes = document.querySelectorAll('.user-checkbox');

            // Event listener untuk "Pilih Semua"
            selectAllCheckbox.addEventListener('change', function () {
                userCheckboxes.forEach(function (checkbox) {
                    checkbox.checked = selectAllCheckbox.checked; // Centang semua checkbox karyawan sesuai dengan status "Pilih Semua"
                });
            });

            // Jika salah satu checkbox karyawan diubah, pastikan "Pilih Semua" diperbarui
            userCheckboxes.forEach(function (checkbox) {
                checkbox.addEventListener('change', function () {
                    if (!this.checked) {
                        selectAllCheckbox.checked = false; // Jika ada checkbox yang tidak dicentang, hilangkan centang pada "Pilih Semua"
                    } else {
                        selectAllCheckbox.checked = Array.from(userCheckboxes).every(function (checkbox) {
                            return checkbox.checked; // Jika semua checkbox dicentang, centang "Pilih Semua"
                        });
                    }
                });
            });
        });
    </script>

    @if($message = Session::get('error'))
        <script>
            Swal.fire('{{$message}}');
        </script>
    @endif

    @if($message = Session::get('success'))
        <script>
            Swal.fire('{{$message}}');
        </script>
    @endif

    @if($message = Session::get('status'))
        <script>
            Swal.fire('{{$message}}');
        </script>
    @endif



</body>

</html>
