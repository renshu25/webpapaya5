<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Logistik Keluar &rsaquo; Detail logistik keluar &mdash; Werehouse BPBD | Kabupaten Jember</title>

    <link rel="shortcut icon" href="{{ asset('landingpages') }}/assets/images/logo/logobpbd1.png" type="image/png" />

    <link rel="stylesheet" href="{{ asset('tdashboard') }}/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('tdashboard') }}/assets/modules/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('tdashboard') }}/assets/modules/select2/dist/css/select2.min.css">

    <link rel="stylesheet" href="{{ asset('tdashboard') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('tdashboard') }}/assets/css/components.css">

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>

    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>

</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a>
                        </li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                    class="fas fa-search"></i></a></li>
                    </ul>
                    <div class="search-element">
                        <input id="search-input" class="form-control" type="search" placeholder="Search"
                            aria-label="Search" data-width="250">
                        <button class="btn" type="button" onclick="performSearch()"><i
                                class="fas fa-search"></i></button>
                    </div>
                    <div id="clock" style="color: white; margin-left: 15px;"></div>
                </form>
                <script>
                    function updateClock() {
                        var now = new Date();

                        var hours = now.getHours();
                        var minutes = now.getMinutes();
                        var seconds = now.getSeconds();
                        var wib = 'WIB';

                        var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                        var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                        var dayName = days[now.getDay()];
                        var day = now.getDate();
                        var monthName = months[now.getMonth()];
                        var year = now.getFullYear();

                        hours = (hours < 10) ? "0" + hours : hours;
                        minutes = (minutes < 10) ? "0" + minutes : minutes;
                        seconds = (seconds < 10) ? "0" + seconds : seconds;
                        day = (day < 10) ? "0" + day : day;

                        var clockElement = document.getElementById('clock');
                        clockElement.innerHTML = dayName + ", " + day + " " + monthName + " " + year + "<br>" +
                            hours + " : " + minutes + " : " + seconds + "  " + wib;

                        setTimeout(updateClock, 1000);
                    }

                    updateClock();
                </script>
                <ul class="navbar-nav navbar-right">
                    </li>
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{ asset('tdashboard') }}/assets/img/avatar/logobpbd1.png"
                                class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->name }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title">
                                @if(Auth::user()->last_login_at)
                                                                @php
                                                                    $diffInMinutes = Carbon\Carbon::now()->diffInMinutes(Auth::user()->last_login_at);
                                                                    $diffInSeconds = Carbon\Carbon::now()->diffInSeconds(Auth::user()->last_login_at);
                                                                    $hours = floor($diffInMinutes / 60);
                                                                    $remainingMinutes = $diffInMinutes % 60;
                                                                @endphp
                                                                @if($diffInMinutes > 60)
                                                                    Login {{ $hours }} jam {{ $remainingMinutes }} menit yang lalu
                                                                @elseif($diffInMinutes > 1)
                                                                    Login {{ $diffInMinutes }} menit yang lalu
                                                                @elseif($diffInSeconds > 0)
                                                                    Login {{ $diffInSeconds }} detik yang lalu
                                                                @else
                                                                    Baru Login
                                                                @endif
                                @else
                                    Baru Login
                                @endif
                            </div>
                            <a href="{{ route('profile.edit') }}" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profil
                            </a>
                            <div class="dropdown-divider"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item has-icon text-danger" style="cursor: pointer;">
                                    <i class="fas fa-door-open" style="display: block; margin-top: 8px;">
                                    </i>Keluar</button>
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <img alt="image" src="{{ asset('tdashboard') }}/assets/img/avatar/logobpbd1.png"
                            style="width: 143px; height: auto; margin-top: 20px;">
                        <a href="{{ route('home') }}"> Werehouse BPBD </a>
                        <hr
                            style="margin-top: 3px; margin-bottom: 3px; border: none; border-bottom: 0.1px solid #C1C1C1; width: 80%;">
                        <p><br></p>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.html">WB</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li>
                            <a href="{{ route('home') }}"><i class="fas fa-home"></i><span>Dashboard</span></a>
                        </li>
                        <li class="menu-header">Master</li>
                        <li class="dropdown">
                            <a href="{{ route('logistics') }}"><i class="fas fa-database"></i> <span>Data
                                    Logistik</span></a>
                        </li>
                        <li class="dropdown">
                            <a href="{{ route('suppliers') }}"><i class="fas fa-table"></i> <span>Data
                                    Supplier</span></a>
                        </li>
                        <li class="menu-header">Aktivitas</li>
                        <li>
                            <a href="{{ route('inlogistics')}}" class="nav-link"><i class="fas fa-sign-in-alt"></i>
                                <span>Logistik Masuk</span></a>
                        </li>
                        <li class=active>
                            <a href="{{ route('outlogistics')}}" class="nav-link"><i class="fas fa-sign-out-alt"></i>
                                <span>Logistik Keluar</span></a>
                        </li>
                        <li>
                            <a href="{{ route('logisticrequests')}}" class="nav-link"><i class="fas fa-truck"></i>
                                <span>Permintaan Logistik</span></a>
                        </li>
                        <li class="menu-header">Pengaturan</li>
                        <li>
                            <a href="{{ route('profile.edit')}}" class="nav-link"><i class="fas fa-user"></i>
                                <span>Profil</span></a>
                        </li>
                        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="btn btn-primary btn-lg btn-block btn-icon-split" type="submit">
                                    <i class="fas fa-door-open"></i> Keluar
                                </button>
                            </form>
                        </div>
                </aside>
            </div>

            <!-- Main -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Detail logistik keluar</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                            <div class="breadcrumb-item"><a href="{{ route('outlogistics') }}">Data Logistik Keluar</a>
                            </div>
                            <div class="breadcrumb-item">Detail logistik keluar</div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="card">
                                <div class="d-flex align-items-center justify-content-end">
                                    <a href="{{ route('outlogistics') }}" class="btn btn-primary mr-2"
                                        style="margin-top: 10px; background-color: silver !important; color: black !important;">
                                        <i class="fas fa-arrow-left"></i> Kembali
                                    </a>
                                    <a href="{{ route('export_show_outlogistic_pdf', ['id' => $outlogistic->id]) }}"
                                        class="btn btn-danger mr-2" style="margin-top: 10px;">
                                        <i class="fas fa-file-pdf"></i> Export PDF
                                    </a>
                                </div>
                                <div class="card-header">
                                    <h4 style="font-size: 2rem;">Detail logistik keluar</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h4 style="color: blue;">Data Penerima</h4>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_penerima">Nama Penerima:</label>
                                                <p>{{ $outlogistic->nama_penerima }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="nik_kk_penerima">NIK / KK:</label>
                                                <p>{{ $outlogistic->nik_kk_penerima }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat_penerima">Alamat Penerima:</label>
                                                <p>{{ $outlogistic->alamat_penerima }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="tanggal_keluar">Tanggal Keluar:</label>
                                                <p>{{ \Carbon\Carbon::parse($outlogistic->tanggal_keluar)->translatedFormat('l, d F Y') }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h4 style="color: blue;">Data Logistik</h4>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_logistik_keluar">Nama Logistik:</label>
                                                <p>{{ $outlogistic->logistic->nama_logistik }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="kode_logistik">Kode Logistik:</label>
                                                <p>{{ $outlogistic->logistic->kode_logistik }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="satuan_logistik_keluar">Satuan Logistik:</label>
                                                <p>{{ $outlogistic->logistic->satuan_logistik }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="jumlah_logistik_keluar">Jumlah:</label>
                                                <p>{{ $outlogistic->jumlah_logistik_keluar }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="keterangan_keluar">Keterangan:</label>
                                                <p>{{ $outlogistic->keterangan_keluar }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="dokumentasi_keluar">Dokumentasi:</label>
                                                <img src="{{ asset($outlogistic->dokumentasi_keluar) }}" width='50'
                                                    height='50' class="img img-responsive" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label>Ditambahkan Pada:</label>
                                            <p>{{ \Carbon\Carbon::parse($outlogistic->created_at)->translatedFormat('l, d F Y') }}
                                            </p>
                                        </div>
                                        <div class="col mb-3">
                                            <label>Diperbarui Pada:</label>
                                            <p>{{ \Carbon\Carbon::parse($outlogistic->updated_at)->translatedFormat('l, d F Y') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead class="table-primary">
                                                        <tr>
                                                            <th class="text-center">Kode Logistik</th>
                                                            <th class="text-center">Nama Logistik</th>
                                                            <th class="text-center">Satuan</th>
                                                            <th class="text-center">Jumlah</th>
                                                            <th class="text-center">Tanggal Keluar</th>
                                                            <th class="text-center">Keterangan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center">
                                                                {{ $outlogistic->logistic->kode_logistik }}
                                                            </td>
                                                            <td class="text-center">
                                                                {{ $outlogistic->logistic->nama_logistik }}
                                                            </td>
                                                            <td class="text-center">
                                                                {{ $outlogistic->logistic->satuan_logistik }}
                                                            </td>
                                                            <td class="text-center">
                                                                {{ $outlogistic->jumlah_logistik_keluar }}
                                                            </td>
                                                            <td class="text-center">
                                                                {{ \Carbon\Carbon::parse($outlogistic->tanggal_keluar)->translatedFormat('l, d F Y') }}
                                                            </td>
                                                            <td class="text-center">
                                                                {{ $outlogistic->keterangan_keluar }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Werehouse BPBD<div class="bullet"></div> Kabupaten Jember
                </div>
                <div class="footer-right">
                </div>
            </footer>
        </div>
    </div>




    <script src="{{ asset('tdashboard') }}/assets/modules/jquery.min.js"></script>
    <script src="{{ asset('tdashboard') }}/assets/modules/popper.js"></script>
    <script src="{{ asset('tdashboard') }}/assets/modules/tooltip.js"></script>
    <script src="{{ asset('tdashboard') }}/assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('tdashboard') }}/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="{{ asset('tdashboard') }}/assets/modules/moment.min.js"></script>
    <script src="{{ asset('tdashboard') }}/assets/js/stisla.js"></script>

    <script src="{{ asset('tdashboard') }}/assets/js/scripts.js"></script>
    <script src="{{ asset('tdashboard') }}/assets/js/custom.js"></script>
</body>

</html>