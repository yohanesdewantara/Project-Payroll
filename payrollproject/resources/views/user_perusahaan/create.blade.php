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
        <a class="navbar-brand ps-3" href="{{ url('/user_perusahaan') }}">Payroll BCA</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>

        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>

        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
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
                            User Perusahaan
                        </a>

                        <a class="nav-link" href="/home">
                            <div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
                            Perusahaan
                        </a>

                        <a class="nav-link" href="/home">
                            <div class="sb-nav-link-icon"><i class="fas fa-calendar-check"></i></div>
                            Jadwal & Rules
                        </a>

                        <div class="sb-sidenav-menu-heading">Payroll</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Layouts
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>

                <div class="container-fluid px-4">
                    <h1 class="mt-4">Tambah User Perusahaan</h1>

                    <div class="row">
                        <div class="col-md-12">

                        @if (session('status'))
                        <div class="alert alert-succes">{{session('status')}}</div>

                        @endif
                            <div class="card">
                                <div class="card-header">
                                    <h4>Tambah User Perusahaan
                                    <a href="{{ url('/user_perusahaan') }}" class="btn btn-primary float-end">Kembali</a>

                                    </h4>
                                </div>
                                <div class="card-body">
                                    <!-- isi konten -->
                                     <form action="{{ url('/user_perusahaan/create') }}" method="POST">
                                        @csrf

                                        <div class="mb3">
                                            <label>Nama</label>
                                            <input type="text" name="nama_user" class="form-control" value="{{old('nama_user')}}"/>

                                            @error ('nama_user')<span class="text-danger">{{ $message }}</span> @enderror

                                        </div>
                                        <!-- <div class="mb3">
                                            <label>id_user</label>
                                            <input type="text" name="id_user" val classue="{{old('id_user')}}"/>
                                        </div> -->
                                        <div class="mb3">
                                            <label>Jabatan</label>
                                            <input type="text" name="jabatan" class="form-control"value="{{old('jabatan')}}"/>

                                            @error ('jabatan')<span class="text-danger">{{ $message }}</span> @enderror

                                        </div>
                                        <div class="mb3">
                                            <label>Alamat</label>
                                            <textarea name="alamat" class="form-control"rows="3">{{old('alamat')}} </textarea>
                                            @error ('alamat')<span class="text-danger">{{ $message }}</span> @enderror

                                        </div>
                                        <div class="mb3">
                                            <label>Gaji</label>
                                            <input type="text" name="gaji" class="form-control"value="{{old('gaji')}}"/>
                                            @error ('gaji')<span class="text-danger">{{ $message }}</span> @enderror

                                        </div>
                                        <div class="mb3">
                                            <label>Nomor rekening user</label>
                                            <input type="text" name="norek_user" class="form-control"value="{{old('norek_user')}}"/>
                                            @error ('norek_user')<span class="text-danger">{{ $message }}</span> @enderror

                                        </div>
                                        <div class="mb3">
                                           <button type="submit" class="btn btn-primary">Save</button>
                                        </div>

                                     </ffor>

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
                <div class="text-muted">Copyright &copy; Your Website 2023</div>
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
</body>

</html>