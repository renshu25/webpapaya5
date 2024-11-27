<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Dashboard &rsaquo; Deteksi &mdash; Werehouse BPBD | Kabupaten Jember</title>

    <link rel="shortcut icon" href="{{ asset('landingpages') }}/assets/images/logo/logopapaya.png" type="image/png" />

    <link rel="stylesheet" href="{{ asset('tdashboard') }}/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('tdashboard') }}/assets/modules/fontawesome/css/all.min.css">

    <!-- <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}"> -->
    <!-- <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}"> -->

    <!-- <link rel="stylesheet" href="{{ asset('assets/modules/ionicons/css/ionicons.min.css') }}"> -->
    <!-- CSS Libraries -->
    <!-- <link rel="stylesheet" href="{{ asset('assets/modules/dropzonejs/dropzone.css') }}"> -->

    <!-- Template CSS -->
    <!-- <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('tdashboard') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('tdashboard') }}/assets/css/components.css">

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>



    <style>
        .spinner-border {
            width: 3rem;
            height: 3rem;
        }

        #uploadedImage {
            max-height: 300px;
            object-fit: contain;
        }
    </style>
</head>

<body>
    <div id="app">
        <div="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                    class="fas fa-search"></i></a></li>
                    </ul>
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
                            <img alt="image" src="{{ asset('tdashboard') }}/assets/img/avatar/logopapaya.png"
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
                        <a href="{{ route('home') }}"> 
                        <img alt="image" src="{{ asset('tdashboard') }}/assets/img/avatar/logopapaya1.png"
                        style="width: 163px; height: auto; margin-top: 20px;">
                        <p><br></p>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.html">PT</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li>
                            <a href="{{ route('home') }}"><i class="fas fa-home"></i><span>Dashboard</span></a>
                        </li>
                        <li class="menu-header">Master</li>
                        <li class=active class="dropdown">
                            <a href="{{ route('logistics') }}"><i class="fas fa-database"></i> <span>Deteksi</span></a>
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

            <!--main content -->
<div class="container mt-5">
    <h1 class="text-center mb-4">Image Classification</h1>
    <!-- Card for Upload -->
    <div class="card p-4">
        <h4 class="text-center mb-3">Upload Your Image</h4>
        <form id="uploadForm" enctype="multipart/form-data">
            <div class="form-group mb-3">
                <label for="file" class="form-label">Choose an image:</label>
                <input type="file" name="file" id="file" class="form-control" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>

    <!-- Loading Spinner -->
    <div id="loading" class="text-center mt-4" style="display: none;">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <p class="mt-2">Processing your image...</p>
    </div>

    <!-- Prediction Result -->
    <div id="result" class="card mt-4 p-4" style="display: none;">
        <h4 class="text-center">Prediction Result</h4>
        <div class="text-center mt-3">
            <!-- mENAMPILKAN HASIL GAMBAR INPUTAN -->
            <img id="uploadedImage" src="" alt="Uploaded Image" class="img-fluid rounded">
        </div>
        <div class="mt-3">
            <p class="mb-1"><strong>Prediction:</strong> <span id="prediction" class="badge bg-success"></span></p>
            <p class="mb-0"><strong>Confidence:</strong> <span id="confidence"></span></p>
        </div>
        <button id="saveButton" class="btn btn-success w-100 mt-3">Simpan</button>
    </div>
</div>

<script>
    const form = document.getElementById('uploadForm');
    const loading = document.getElementById('loading');
    const result = document.getElementById('result');
    const hasil = {};

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        loading.style.display = 'block'; // Tampilkan spinner
        result.style.display = 'none'; // Sembunyikan hasil sebelumnya
        const fileInput = document.querySelector('#file');
        const file = fileInput.files[0];
        const fileURL = URL.createObjectURL(file);
        console.log(fileURL)

        try {
            const formData = new FormData();
            const file = fileInput.files[0];
            formData.append('file', file);

            fetch('http://127.0.0.1:5000/predict', {
                method: 'POST',
                body: formData, // Kirim formData
            })
            .then(response => response.json())
            .then(data => {
                console.log('Hasil:', data);
                // Tampilkan respons dari API (bisa berupa prediksi atau pesan)
                // alert('Hasil Prediksi: ' + JSON.stringify(data));
                document.getElementById('uploadedImage').src = fileURL;
                document.getElementById('prediction').textContent = data.prediction;
                document.getElementById('confidence').textContent = data.confidence;
            })
            .catch(error => {
                console.error('Terjadi kesalahan:', error);
                alert('Terjadi kesalahan saat memproses file!');
            });

            // Tampilkan hasil prediksi jika berhasil
            loading.style.display = 'none';
            result.style.display = 'block';
        }
        catch (err) {
            // Tangani error jika gagal
            loading.style.display = 'none'; // Sembunyikan spinner
            console.error(err); // Log error di konsol
            alert('Failed to process the image. Please try again.');
        }
    });

    document.getElementById('saveButton').addEventListener('click', () => {
        const prediction = document.getElementById('prediction').textContent;
        const confidence = document.getElementById('confidence').textContent;
        const uploadedImage = document.getElementById('uploadedImage').src;

        // Ambil data yang sudah ada dari Local Storage
        let results = JSON.parse(localStorage.getItem('results')) || [];

        // Tambahkan hasil baru
        results.push({
            image: uploadedImage,
            prediction: prediction,
            confidence: confidence,
            date: new Date().toLocaleString()
        });

        // Simpan kembali ke Local Storage
        localStorage.setItem('results', JSON.stringify(results));

        alert('Hasil berhasil disimpan!');
 });
</script>

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