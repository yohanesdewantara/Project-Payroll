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
        <a class="navbar-brand ps-3" href="{{ url('/perusahaan') }}">Payroll BCA</a>
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
                    <li><a class="dropdown-item" href="#!">Logout</a></li>
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

                        <a class="nav-link" href="{{ route('home') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Karyawan
                        </a>

                        <a class="nav-link" href="/home">
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



                        <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Payroll
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="layout-static.html">Log Payroll</a>
                                <a class="nav-link" href="layout-sidenav-light.html">apalagi ya?</a>
                            </nav>
                        </div> -->
                    </div>
                </div>

            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>

                <div class="container-fluid px-4">
                    <h1 class="mt-4"></h1>

                    <div class="row">
                        <div class="col-md-12">

                            @if(session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Sukses!</strong> User berhasil diupdate
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit Perusahaan
                                        <a href="{{ url('/perusahaan') }}" class="btn btn-primary float-end">Kembali</a>

                                    </h4>
                                </div>
                                <div class="card-body">
                                    <!-- isi konten -->
                                    <form action="{{ url('perusahaan/' . $perusahaan->id_perusahaan . '/update') }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb3">
                                            <label>Nama Perusahaan</label>
                                            <input type="text" name="nama_perusahaan" class="form-control"
                                                value="{{$perusahaan->nama_perusahaan}}" />

                                            @error ('nama_user')<span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>
                                        <!-- <div class="mb3">
                                            <label>id_user</label>
                                            <input type="text" name="id_user" val classue="{{old('id_user')}}"/>
                                        </div> -->
                                        <div class="mb3">
                                            <label>Alamat</label>
                                            <textarea name="alamat" class="form-control"
                                                rows="3">{{$perusahaan->alamat}} </textarea>
                                            @error ('alamat')<span class="text-danger">{{ $message }}</span> @enderror

                                        </div>



                                        <div class="mb3">
                                            <label>No telp</label>
                                            <input type="text" name="nohp_perusahaan" class="form-control"
                                                value="{{$perusahaan->nohp_perusahaan}}" />

                                            @error ('nohp_perusahaan')<span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>


                                        <div class="mb3">
                                            <label>Nomor rekening perusahaan</label>
                                            <input type="text" name="norek_perusahaan" class="form-control"
                                                value="{{$perusahaan->norek_perusahaan}}" />
                                            @error ('norek_perusahaan')<span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>

                                        <div class="mb3">
                                            <label>Saldo</label>
                                            <input type="text" name="saldo" class="form-control"
                                                value="{{$perusahaan->saldo}}" />

                                            @error ('saldo')<span class="text-danger">{{ $message }}</span> @enderror

                                        </div>


                                        <div class="mb3 mt-4">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>

                                    </form>

                                </div>

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
</body>

@if($message = Session::get('status'))
    <script>
        Swal.fire('{{$message}}');
    </script>
@endif


</html>
