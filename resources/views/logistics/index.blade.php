<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Dashboard &rsaquo; Deteksi &mdash; Papaya Tech</title>

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

        .card {
            max-width: 500px;
            margin: 30px auto;
            border: 1px solid #dee2e6;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        #video {
            display: block;
            width: 100%;
            max-width: 100%;
            height: auto;
            margin-top: 15px;
            border-radius: 10px;
            border: 2px solid #ccc;
        }

        #capture,
        #download {
            margin-top: 10px;
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
                                style="width: 120px; height: auto; margin-top: 23px; margin-bottom: 28px;">
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
            <div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Deteksi</h1>
    </div>
                <!-- Card for Upload -->
                <div class="row">
                    <!-- Card Upload dan Kamera -->
                    <div class="col-md-6">
                        <div class="card p-4">
                            <h4 class="text-center mb-3">Upload atau Ambil Foto</h4>
                            <form id="uploadForm" enctype="multipart/form-data">

                                <h5 class="text-center mt-4">Ambil Foto dari Kamera</h5>
                                <!-- Video Stream -->
                                <video id="video" autoplay></video>

                                <!-- Capture Button -->
                                <button type="button" id="capture" class="btn btn-success w-100 mt-3">Ambil
                                    Foto</button>

                                <!-- Download Link -->
                                <a id="download" href="#" download="foto.jpg" class="btn btn-primary w-100 mt-2"
                                    style="display: none;">Unduh Foto</a>

                                <!-- Upload Image -->
                                <div class="form-group mb-3">
                                    <label for="file" class="form-label fw-bold">Upload Gambar:</label>
                                    <input type="file" name="file" id="file" class="form-control" accept="image/*"
                                        required>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Submit</button>
                            </form>
                        </div>
                    </div>

                    <!-- Loading Spinner -->
                    <div id="loading" class="text-center mt-4" style="display: none;">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2">Processing your image...</p>
                    </div>

                    <!-- Prediction Result -->
                    <div class="col-md-6">
                        <div id="result" class="card p-4" style="display: none;">
                            <h4 class="text-center">Prediction Result</h4>
                            <div class="text-center mt-3">
                                <!-- Menampilkan Hasil Gambar Inputan -->
                                <img id="uploadedImage" src="" alt="Uploaded Image"
                                    class="img-fluid rounded result-image">
                            </div>
                            <div class="mt-3">
    <p class="mb-1"><strong>Prediction:</strong> <span id="prediction" class="badge bg-success"></span></p>
    <p class="mb-1"><strong>Confidence:</strong> <span id="confidence"></span></p>

    <!-- Tambahkan Dropdown Ukuran -->
    <div class="form-group mt-3">
        <label for="sizeSelect"><strong>Pilih Ukuran Buah:</strong></label>
        <select id="sizeSelect" class="form-control">
            <option value="kecil">Kecil</option>
            <option value="sedang">Sedang</option>
            <option value="besar">Besar</option>
        </select>
    </div>

    <button id="simulateBtn" class="btn btn-warning w-100 mt-2">Simulasikan Harga</button>

    <!-- Hasil Simulasi -->
    <div id="simulationResult" class="mt-3" style="display: none;">
        <p><strong>Estimasi Bobot:</strong> <span id="weightResult"></span> kg</p>
        <p><strong>Harga Jual:</strong> <span id="priceResult"></span></p>
    </div>
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

    // Data tambahan dari simulasi
    const ukuran = document.getElementById("sizeSelect").value;
    const berat = document.getElementById("weightResult").textContent;
    const harga = document.getElementById("priceResult").textContent;

    let results = JSON.parse(localStorage.getItem('results')) || [];

    results.push({
        image: uploadedImage,
        prediction: prediction,
        confidence: confidence,
        ukuran: ukuran,
        berat: berat,
        harga: harga,
        date: new Date().toLocaleString()
    });

    localStorage.setItem('results', JSON.stringify(results));

    alert('Hasil berhasil disimpan!');
});

                    </script>

                    <script>
                        const video = document.getElementById('video');
                        const captureButton = document.getElementById('capture');
                        const downloadLink = document.getElementById('download');

                        // Akses kamera DroidCam
                        navigator.mediaDevices.enumerateDevices()
                            .then(devices => {
                                const videoDevices = devices.filter(device => device.kind === 'videoinput');
                                console.log("Kamera Tersedia:", videoDevices);

                                // Pilih DroidCam sebagai sumber video
                                const droidCam = videoDevices.find(device =>
                                    device.label.toLowerCase().includes('droidcam')
                                );

                                const constraints = { video: { deviceId: droidCam ? droidCam.deviceId : videoDevices[0].deviceId } };

                                // Akses kamera DroidCam
                                return navigator.mediaDevices.getUserMedia(constraints);
                            })
                            .then(stream => {
                                video.srcObject = stream;
                            })
                            .catch(error => {
                                console.error("Tidak bisa mengakses kamera DroidCam:", error);
                            });

                        // Ambil gambar dari video
                        captureButton.addEventListener('click', () => {
                            const canvas = document.createElement('canvas');
                            canvas.width = video.videoWidth;
                            canvas.height = video.videoHeight;
                            const context = canvas.getContext('2d');
                            context.drawImage(video, 0, 0, canvas.width, canvas.height);

                            // Konversi gambar ke URL data
                            const imageData = canvas.toDataURL('image/jpeg');

                            // Tampilkan tautan unduh
                            downloadLink.href = imageData;
                            downloadLink.style.display = 'inline';

                        });
                    </script>
                    <script>
    // Fungsi simulasi harga
    document.getElementById("simulateBtn").addEventListener("click", () => {
        const kematangan = document.getElementById("prediction").textContent.toLowerCase();
        const ukuran = document.getElementById("sizeSelect").value;

        const hargaPerKg = {
            "mentah": 4000,
            "setengah matang": 5000,
            "matang": 6000
        };

        const bobotPerUkuran = {
            "kecil": 0.8,
            "sedang": 1.2,
            "besar": 1.8
        };

        const berat = bobotPerUkuran[ukuran];
        const harga = hargaPerKg[kematangan] * berat;

        document.getElementById("weightResult").textContent = berat.toFixed(2);
        document.getElementById("priceResult").textContent = "Rp " + harga.toLocaleString('id-ID');
        document.getElementById("simulationResult").style.display = "block";
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