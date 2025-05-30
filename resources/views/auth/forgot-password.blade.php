<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Forgot Password &rsaquo; Papaya Tech</title>

    <link rel="shortcut icon" href="{{ asset('landingpages') }}/assets/images/logo/logopapaya.png" type="image/png" />

    <link rel="shortcut icon" href="{{ asset('tloginjadi') }}/assets/images/fav.jpg">
    <link rel="stylesheet" href="{{ asset('tloginjadi') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('tloginjadi') }}/assets/css/fontawsom-all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('tloginjadi') }}/assets/css/style.css" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<style>
    body {
        position: relative; /* Agar pseudo-elemen bisa diposisikan dengan benar */
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background-image: url('{{ asset("tloginjadi") }}/assets/images/papaya8.jpg');
        background-size: cover;
        background-position: center, center;
        overflow: hidden; /* Menghindari scroll jika ada elemen yang meluap */
    }

    /* Lapisan gelap */
    body::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5); /* Warna hitam dengan transparansi 50% */
        z-index: 0; /* Pastikan lapisan ini di belakang konten */
    }

    .container-fluid {
        padding-top: 90px;
        text-align: center;
        position: relative; /* Agar konten tetap di atas lapisan gelap */
        z-index: 1; /* Konten di atas semua lapisan */
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
    <div class="container-fluid ">
        <div class="container ">
            <div class="row cdvfdfd">
                <div class="col-lg-10 col-md-12 login-box">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 log-det">
                            <div class="small-logo">
                                <img src="{{ asset('tloginjadi') }}/assets/images/Group 1.svg" alt="Logo">
                            </div>
                            <p class="dfmn">Forgot Password</p>
                            <div class="text-box-cont">
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fas fa-user"></i></span>
                                        </div>
                                        <input type="email" class="form-control" placeholder="Email" aria-label="Email"
                                            aria-describedby="basic-addon1" name="email">
                                    </div>
                                   <div class="input-group center">
    <style>
        .btn-danger {
            background-color: rgb(255, 165, 0); /* Warna oranye */
            border-color: rgb(255, 59, 0); /* Warna border */
            transition: background-color 0.3s, border-color 0.3s; /* Efek transisi */
        }

        .btn-danger:hover {
            background-color: rgb(255, 140, 0); /* Warna oranye lebih gelap saat hover */
            border-color: rgb(255, 69, 0); /* Warna border lebih gelap saat hover */
            cursor: pointer; /* Menunjukkan bahwa tombol dapat diklik */
        }
    </style>
    <button class="btn btn-danger">Kirim Link</button>
</div>
                                </form>
                                <div class="row">
                                    <p class="forget-p">PAPAYA TECH</p>
                                </div>
                                <div class="row">
                                    <p class="small-info"></p>
                                </div>
                            </div>
                        </div>
                        @if(Session::has('success') || Session::has('error'))
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

                                @if(Session::has('success'))
                                    Toast.fire({
                                        icon: 'success',
                                        title: '{{ Session::get('success') }}'
                                    });
                                @elseif(Session::has('error'))
                                    Toast.fire({
                                        icon: 'error',
                                        title: '{{ Session::get('error') }}'
                                    });
                                @endif
                            </script>
                        @endif

                        <script>
                            document.addEventListener('DOMContentLoaded', (event) => {
                                const form = document.getElementById('myForm');

                                form.addEventListener('submit', function (e) {
                                    let valid = true;
                                    let errorMessage = '';

                                    // Check for empty fields
                                    form.querySelectorAll('input, textarea').forEach(input => {
                                        if (input.value.trim() === '') {
                                            valid = false;
                                            errorMessage = 'Kolom wajib diisi';
                                        }
                                    });

                                    // Check for valid email
                                    const emailField = document.getElementById('email');
                                    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                                    if (emailField && !emailPattern.test(emailField.value)) {
                                        valid = false;
                                        errorMessage = 'Email tidak valid';
                                    }

                                    if (!valid) {
                                        e.preventDefault(); // Prevent form submission
                                        Swal.fire({
                                            icon: 'error',
                                            title: errorMessage,
                                            timer: 3000,
                                            timerProgressBar: true
                                        });
                                    }
                                });
                            });
                        </script>
                        <div class="col-lg-6 col-md-6 box-de">
                            <div class="inn-cover">
                                <div class="ditk-inf">
                                    <h2 class="w-100">Kembali ke halaman Login? </h2>
                                    <p>Jika anda yakin, Silahkan tekan tombol dibawah ini !</p>
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
        </div>
    </div>
</body>



<script src="{{ asset('tloginjadi') }}/assets/js/jquery-3.2.1.min.js"></script>
<script src="{{ asset('tloginjadi') }}/assets/js/popper.min.js"></script>
<script src="{{ asset('tloginjadi') }}/assets/js/bootstrap.min.js"></script>
<script src="{{ asset('tloginjadi') }}/assets/js/script.js"></script>

</html>