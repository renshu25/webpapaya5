<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register &rsaquo; PAPAYA TECH</title>

    <link rel="shortcut icon" href="{{ asset('landingpages') }}/assets/images/logo/logopapaya.png" type="image/png" />
    <link rel="shortcut icon" href="{{ asset('tloginjadi') }}/assets/images/fav.jpg">
    <link rel="stylesheet" href="{{ asset('tloginjadi') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('tloginjadi') }}/assets/css/fontawsom-all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('tloginjadi') }}/assets/css/style.css" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<style>
    body {
        position: relative;
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background-image: url('{{ asset("tloginjadi") }}/assets/images/papaya8.jpg');
        background-size: cover;
        background-position: center, center;
        overflow: hidden;
    }

    /* Lapisan gelap */
    body::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        z-index: 0;
    }

    .container-fluid {
        padding-top: 90px;
        text-align: center;
        position: relative;
        z-index: 1;
    }

    @media screen and (max-width: 768px) {
        .container-fluid {
            padding-top: 50px;
        }
    }

    .login-info {
        margin-top: 20px;
    }

    @media screen and (max-width: 768px) {
        .login-info {
            margin-top: 40px;
        }
    }
</style>

<body>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-12 login-box">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 log-det">
                            <div class="small-logo">
                                <img src="{{ asset('tloginjadi') }}/assets/images/Group 1.svg" alt="Logo">
                            </div>
                            <h2 class="w-100"></h2>

                            <div class="text-box-cont">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <!-- Name -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="name" placeholder="Name" aria-label="Name" aria-describedby="basic-addon1">
                                    </div>

                                    <!-- Email Address -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <input type="email" class="form-control" name="email" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1">
                                    </div>

                                    <!-- Password -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                                        </div>
                                        <input type="password" class="form-control" name="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                                        </div>
                                        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" aria-label="Confirm Password" aria-describedby="basic-addon1">
                                    </div>

                                    <div class="input-group center">
                                        <button class="btn btn-danger">REGISTER</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        @if(session('status') || $errors->any())
                            <script>
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 9000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer);
                                        toast.addEventListener('mouseleave', Swal.resumeTimer);
                                    }
                                });

                                @if(session('status'))
                                    Toast.fire({
                                        icon: 'success',
                                        title: 'Berhasil',
                                        text: '{{ session('status') }}'
                                    });
                                @elseif($errors->any())
                                    Toast.fire({
                                        icon: 'error',
                                        title: 'Gagal!',
                                        text: '{{ $errors->first() }}'
                                    });
                                @endif
                            </script>
                        @endif

                        <div class="col-lg-6 col-md-6 box-de">
                            <div class="inn-cover">
                                <div class="ditk-inf">
                                    <h2 class="w-100">Sudah Punya Akun?</h2>
                                    <p>Jika Anda sudah memiliki akun, klik tombol di bawah ini untuk login.</p>
                                    <a href="{{ route('login') }}">
                                        <button type="button" class="btn btn-outline-light">Login</button>
                                    </a>
                                </div>
                                <div class="foter-credit">
                                    <a href="https://smarteyeapps.com/"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <p style="font-size: 15px; font-family: 'Merriweather', serif; color: white; margin-top: 20px;">Silahkan isi nama, email, dan password untuk melakukan registrasi.</p>
            </div>
        </div>
    </div>
</body>

<script src="{{ asset('tloginjadi') }}/assets/js/jquery-3.2.1.min.js"></script>
<script src="{{ asset('tloginjadi') }}/assets/js/popper.min.js"></script>
<script src="{{ asset('tloginjadi') }}/assets/js/bootstrap.min.js"></script>
<script src="{{ asset('tloginjadi') }}/assets/js/script.js"></script>

</html>
