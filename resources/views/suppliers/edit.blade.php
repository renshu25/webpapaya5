<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Data Supplier &rsaquo; Edit data supplier &mdash; Werehouse BPBD | Kabupaten Jember</title>

    <link rel="shortcut icon" href="{{ asset('landingpages') }}/assets/images/logo/logobpbd1.png" type="image/png" />

    <link rel="stylesheet" href="{{ asset('tdashboard') }}/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('tdashboard') }}/assets/modules/fontawesome/css/all.min.css">

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

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a>
                    </li>
                    <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                class="fas fa-search"></i></a></li>
                </ul>
                <div class="search-element">
                    <input id="search-input" class="form-control" type="search" placeholder="Search" aria-label="Search"
                        data-width="250">
                    <button class="btn" type="button" onclick="performSearch()"><i class="fas fa-search"></i></button>
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
                    <li class=active class="dropdown">
                        <a href="{{ route('suppliers') }}"><i class="fas fa-table"></i> <span>Data Supplier</span></a>
                    </li>
                    <li class="menu-header">Aktivitas</li>
                    <li>
                        <a href="{{ route('inlogistics')}}" class="nav-link"><i class="fas fa-sign-in-alt"></i>
                            <span>Logistik Masuk</span></a>
                    </li>
                    <li>
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
                    <h1>Edit data supplier</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                        <div class="breadcrumb-item"><a href="{{ route('suppliers') }}">Data Supplier</a></div>
                        <div class="breadcrumb-item">Edit data supplier</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Form edit data supplier</h4>
                            </div>
                            <div class="card-body">
                                <form id="supplierEditForm" action="{{ route('suppliers.update', $supplier->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="kode_supplier">Kode Supplier</label>
                                        <input type="text" class="form-control" id="kode_supplier" name="kode_supplier"
                                            placeholder="*Masukkan kode supplier" value="{{ $supplier->kode_supplier }}"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_supplier">Nama Supplier</label>
                                        <input type="text" class="form-control" id="nama_supplier" name="nama_supplier"
                                            placeholder="*Masukkan nama supplier" value="{{ $supplier->nama_supplier }}"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email_supplier">Email</label>
                                        <input type="email" name="email_supplier" id="email_supplier"
                                            class="form-control" placeholder="*Masukkan alamat email"
                                            value="{{ $supplier->email_supplier }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="telepon_supplier">Telepon</label>
                                        <input type="tel" name="telepon_supplier" id="telepon_supplier"
                                            class="form-control" placeholder="*Masukkan nomor telepon"
                                            value="{{ $supplier->telepon_supplier }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="instansi_supplier">Instansi</label>
                                        <select name="instansi_supplier" id="instansi_supplier" class="form-control"
                                            required>
                                            <option value="" disabled>*Pilih instansi</option>
                                            <option value="Pemerintah" {{ $supplier->instansi_supplier == "Pemerintah" ? 'selected' : '' }}>Pemerintah</option>
                                            <option value="Kabupaten/Kota" {{ $supplier->instansi_supplier == "Kabupaten/Kota" ? 'selected' : '' }}>
                                                Kabupaten/Kota</option>
                                            <option value="Kecamatan" {{ $supplier->instansi_supplier == "Kecamatan" ? 'selected' : '' }}>Kecamatan</option>
                                            <option value="Desa/Kelurahan" {{ $supplier->instansi_supplier == "Desa/Kelurahan" ? 'selected' : '' }}>
                                                Desa/Kelurahan</option>
                                            <option value="Swasta" {{ $supplier->instansi_supplier == "Swasta" ? 'selected' : '' }}>Swasta</option>
                                            <option value="Umum" {{ $supplier->instansi_supplier == "Umum" ? 'selected' : '' }}>Umum</option>
                                            <option value="Lainnya" {{ $supplier->instansi_supplier == "Lainnya" ? 'selected' : '' }}>Lainnya</option>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="d-flex justify-content-between">
                                            <a href="{{ route('suppliers') }}" class="btn btn-primary mx-2"
                                                style="background-color: silver !important; color: black !important;">
                                                <i class="fas fa-arrow-left"></i> Kembali
                                            </a>
                                            <button type="submit" class="btn btn-primary mx-2"> Perbarui </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <script>
            document.getElementById('supplierEditForm').addEventListener('submit', function (event) {
                var isValid = true;
                var inputs = document.querySelectorAll('#supplierEditForm [required]');

                inputs.forEach(function (input) {
                    if (!input.value) {
                        isValid = false;
                        input.classList.add('is-invalid');
                    } else {
                        input.classList.remove('is-invalid');
                    }
                });

                if (!isValid) {
                    event.preventDefault();
                    alert('Semua kolom wajib diisi!');
                }
            });
        </script>

        <style>
            .is-invalid {
                border-color: #dc3545;
            }
        </style>

        <footer class="main-footer">
            <div class="footer-left">
                Werehouse BPBD<div class="bullet"></div> Kabupaten Jember
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

<script>
    function performSearch() {
        const searchQuery = document.getElementById('search-input').value.toLowerCase();
        const tableRows = document.querySelectorAll('table tbody tr');
        tableRows.forEach(row => {
            const rowData = row.innerText.toLowerCase();
            if (rowData.includes(searchQuery)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }
    document.getElementById('search-input').addEventListener('input', performSearch);
</script>


</body>

</html>