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
        /* Menyesuaikan ukuran dropdown */
        #bank {
            width: 250px;
            /* Menetapkan lebar dropdown secara eksplisit */
            padding: 8px;
            /* Padding untuk mempercantik tampilan */
            font-size: 14px;
            /* Ukuran font lebih kecil */
        }

        .form-select {
            max-width: 100%;
            /* Membatasi ukuran dropdown agar tidak melampaui lebar container */
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
                <!-- <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button> -->
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
                        <li class="nav-item">
                            @if(session('role') === 'Super Admin' || session('role') === 'Admin')
                                <a class="nav-link" href="{{ url('/user_perusahaan') }}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                    Karyawan
                                </a>
                            @endif
                        </li>

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
                    <h1 class="mt-4">Penggajian</h1>
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





                    <form action="{{ route('setJadwalGaji') }}" method="POST">


                        @csrf
                        <div class="mb-3">
                            <label for="jadwal_gaji_tanggal" class="form-label">Tanggal Gaji:</label>
                            <input type="date" id="jadwal_gaji_tanggal" name="jadwal_gaji_tanggal" class="form-control"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="jadwal_gaji_jam" class="form-label">Jam Gaji:</label>
                            <input type="time" id="jadwal_gaji_jam" name="jadwal_gaji_jam" class="form-control"
                                required>
                        </div>
                        <a href="{{ url('/jadwal_gaji') }}" class="btn btn-primary float-end">Kembali</a>

                        <!-- Pilih Karyawan untuk Pembayaran Gaji -->
                        <div class="mb-3">
                            <label for="user_ids" class="form-label fw-bold">Pilih Karyawan untuk Pembayaran
                                Gaji:</label>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="select_all"> Pilih Semua
                            </div>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Gaji</th>
                                        <th>Status</th>
                                        <th>Jadwal</th>
                                        <th>Pilih</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user_perusahaan as $daf_user)
                                        <tr>
                                            <td>{{ $daf_user->id_user }}</td>
                                            <td>{{ $daf_user->nama_user }}</td>
                                            <td>Rp{{ number_format($daf_user->gaji, 2, ',', '.') }}</td>
                                            <td>{{ $daf_user->status }}</td>
                                            <td>
                                                @if($daf_user->jadwal_gaji_tanggal)
                                                    {{ \Carbon\Carbon::parse($daf_user->jadwal_gaji_tanggal)->isValid() ? \Carbon\Carbon::parse($daf_user->jadwal_gaji_tanggal)->format('d-m-Y') : 'Tanggal tidak valid' }}
                                                    at {{ $daf_user->jadwal_gaji_jam ?? '---' }}
                                                @else
                                                    'Belum Dijadwalkan'
                                                @endif
                                            </td>
                                            <td>
                                                <input type="checkbox" class="user-checkbox" name="user_ids[]"
                                                    value="{{ $daf_user->id_user }}">
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>

                        <button type="submit" class="btn btn-primary">Set Jadwal Gaji</button>
                    </form>






                </div>
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



</body>

</html>
