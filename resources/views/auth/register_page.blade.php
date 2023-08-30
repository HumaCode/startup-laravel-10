<!doctype html>
<html lang="id">

<head>

    <meta charset="utf-8" />
    <title>Halaman Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta
        content="Aplikasi ini ditujukan untuk para mahasiswa Fakultas Teknik dan Ilmu Komputer Jurusan D3 Manajemen Informatika"
        name="description" />
    <meta content="{{ config('app.name') }}" name="Humaidi Zakaria" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets') }}/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets') }}/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets') }}/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body class="auth-body-bg">
    <div class="bg-overlay"></div>
    <div class="wrapper-page">
        <div class="container-fluid p-0">
            <div class="card">
                <div class="card-body">

                    <div class="text-center mt-4">
                        <div class="mb-3">
                            <a href="index.html" class="auth-logo">
                                <img src="{{ asset('assets') }}/anim/register.gif" class="logo-dark mx-auto"
                                    alt="">
                            </a>
                        </div>
                    </div>

                    <h4 class="text-muted text-center font-size-18"><b>Buat Akun Baru</b></h4>

                    <div class="p-3">
                        <form class="form-horizontal mt-3" method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <select name="role" id="role" class="form-control">
                                        <option value="">-- Pilih Status--</option>
                                        <option value="1">Dosen</option>
                                        <option value="2">Mahasiswa</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control" name="nama" value="{{ old('nama') }}"
                                        type="text" placeholder="Nama">
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control" name="username" value="{{ old('username') }}"
                                        type="text" placeholder="Username">
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control" name="email" value="{{ old('email') }}"
                                        type="email" placeholder="Email">
                                </div>
                            </div>


                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control" name="password" type="password" placeholder="Password">
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control" name="password_confirmation" type="password"
                                        placeholder="Konfirmasi Password">
                                </div>
                            </div>



                            <div class="form-group text-center row mt-3 pt-1">
                                <div class="col-12">
                                    <button class="btn btn-info w-100 waves-effect waves-light"
                                        type="submit">DAFTAR</button>
                                </div>
                            </div>

                            <div class="form-group mt-2 mb-0 row">
                                <div class="col-12 mt-3 text-center">
                                    <a href="{{ route('login') }}" class="text-muted">Sudah memiliki akun?</a>
                                </div>
                            </div>
                        </form>
                        <!-- end form -->
                    </div>
                </div>
                <!-- end cardbody -->
            </div>
            <!-- end card -->
        </div>
        <!-- end container -->
    </div>
    <!-- end -->


    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets') }}/libs/jquery/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets') }}/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{ asset('assets') }}/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ asset('assets') }}/libs/node-waves/waves.min.js"></script>

    <script src="{{ asset('assets') }}/js/app.js"></script>

</body>

</html>
