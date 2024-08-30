<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Monitoring Heartbeat</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
    <style>
        body {
            background: url('images/bg1.png') repeat center center fixed;
            background-size: cover;
            font-family: 'Arial', sans-serif;
            color: #333;
        }
        .content-container {
            margin-top: 50px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .content-container h1, .content-container h2 {
            color: #333;
        }
        .content-container ol {
            padding-left: 20px;
        }
        .content-container ul {
            padding-left: 20px;
            list-style-type: disc;
        }
        .navbar-custom {
            background-color: #31c2e2;
        }
        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: white;
        }
        .navbar-brand {
            font-size: 1.75em;
            font-weight: bold;
        }
        .nav-link {
            font-size: 1.25em;
        }
        .main-footer {
            background: rgba(255, 255, 255, 0.9);
            border-top: 1px solid #dee2e6;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/home" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/about" class="nav-link">About</a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/" class="brand-link">
                <span class="brand-text font-weight-light">Monitoring Heartbeat</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="/pasien" class="nav-link">
                                <i class="nav-icon fas fa-history"></i>
                                <p>Data Pasien Lama</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/inputdata" class="nav-link">
                                <i class="nav-icon fas fa-user-plus"></i>
                                <p>Data Pasien Baru</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- /.sidebar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>About</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                                <li class="breadcrumb-item active">About</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="content-container">
                        <h1>Panduan Penggunaan Aplikasi Monitoring Heartbeat</h1>
                        <p>Selamat datang di aplikasi Monitoring Heartbeat. Berikut adalah panduan singkat tentang cara menggunakan aplikasi ini:</p>
                        <ol>
                            <li><strong>Hubungkan perangkat:</strong> Pastikan perangkat sensor detak jantung Anda terhubung dengan benar ke NodeMCU atau ESP8266 dan telah terhubung ke jaringan WiFi.</li>
                            <li><strong>Konfigurasi Firebase:</strong> Pastikan Anda telah mengatur konfigurasi Firebase dengan benar di dalam file proyek Anda.</li>
                            <li><strong>Mulai Aplikasi:</strong> Jalankan aplikasi dan buka halaman utama. Anda akan melihat pembacaan detak jantung (BPM) dan status kesehatan.</li>
                            <li><strong>Grafik BPM:</strong> Grafik BPM akan menampilkan data detak jantung secara real-time. Anda dapat memonitor perubahan detak jantung secara langsung.</li>
                            <li><strong>Troubleshooting:</strong> Jika terjadi masalah, pastikan koneksi perangkat dan konfigurasi Firebase sudah benar. Anda juga bisa merujuk ke dokumentasi untuk solusi lebih lanjut.</li>
                        </ol>
                        <h2>Panduan Penempelan Elektroda Sensor AD8232 ke Tubuh</h2>
                        <p>Untuk mendapatkan pembacaan detak jantung yang akurat, penting untuk menempelkan elektroda sensor AD8232 dengan benar. Berikut adalah langkah-langkahnya:</p>
                        <ol>
                            <li><strong>Bersihkan area kulit:</strong> Bersihkan area kulit yang akan ditempeli elektroda dengan alkohol atau sabun untuk menghilangkan minyak dan kotoran.</li>
                            <li><strong>Posisi elektroda:</strong>
                                <ul>
                                    <li>Elektroda pertama (RA - Right Arm): Tempelkan pada lengan kanan atas di bawah tulang selangka.</li>
                                    <li>Elektroda kedua (LA - Left Arm): Tempelkan pada lengan kiri atas di bawah tulang selangka.</li>
                                    <li>Elektroda ketiga (RL - Right Leg atau Ground): Tempelkan di sisi kanan perut bagian bawah, atau tempatkan di lokasi netral seperti pergelangan kaki kanan.</li>
                                </ul>
                            </li>
                            <li><strong>Pastikan koneksi baik:</strong> Pastikan elektroda terpasang dengan baik dan tidak mudah lepas. Kabel harus terhubung dengan kuat ke sensor AD8232.</li>
                            <li><strong>Mulai pengukuran:</strong> Setelah semua elektroda terpasang, nyalakan perangkat dan mulailah pengukuran. Periksa tampilan pada aplikasi untuk memastikan sinyal terdeteksi dengan benar.</li>
                        </ol>
                        <p>Aplikasi Web masih dalam Pengembangan, berikan saran dan kritik Anda agar web menjadi lebih baik.</p>
                        <p>Terima Kasih</p>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer text-center">
            <strong>Monitoring Detak Jantung by Mohamad Ramdani & Mukhammad Fadel Abdillah &copy; 2024</strong>
        </footer>
    </div>
    <!-- ./wrapper -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
</body>
</html>
