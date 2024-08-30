<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Pasien</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
    <style>
        body {
            background: url('images/bg1.png') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Arial', sans-serif;
            color: #333;
        }
        .card {
            margin-top: 50px;
            border-radius: 20px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            background-color: rgba(255, 255, 255, 0.9);
        }
        .card-header {
            background-color: #31c2e2;
            color: white;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            text-align: center;
            font-size: 1.75em;
            padding: 20px;
        }
        .card-body {
            padding: 30px;
        }
        .btn-primary {
            background-color: #31c2e2;
            border-color: #31c2e2;
            font-size: 1.1em;
            border-radius: 20px;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #2ba7c2;
            border-color: #2ba7c2;
        }
        .form-control, .form-control:focus {
            border-radius: 15px;
            border-color: #e3e3e3;
            box-shadow: none;
        }
        .form-control::placeholder {
            color: #aaa;
        }
        .form-group label {
            font-weight: bold;
        }
        .alert {
            border-radius: 15px;
            padding: 15px;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 0.9em;
            color: #777;
        }
        .form-group .form-control {
            transition: border-color 0.3s ease;
        }
        .form-group .form-control:focus {
            border-color: #31c2e2;
            box-shadow: 0 0 0 0.2rem rgba(31, 194, 226, 0.25);
        }
        .form-group input::placeholder {
            color: #888;
        }
        .card-body h3 {
            font-size: 1.25em;
            margin-bottom: 20px;
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
                            <h1>Input Data Pasien</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                                <li class="breadcrumb-item active">Input Data Pasien</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            Input Data Pasien
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form action="{{ route('input.store') }}" method="POST">
                                @csrf
                                <h3>Silakan isi data pasien di bawah ini:</h3>
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama lengkap" required>
                                </div>
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" id="alamat" name="alamat" rows="4" placeholder="Masukkan alamat" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="birthdate">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Jenis Kelamin</label>
                                    <select class="form-control" id="gender" name="gender" required>
                                        <option value="male">Laki-laki</option>
                                        <option value="female">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="medicalHistory">Riwayat Penyakit</label>
                                    <textarea class="form-control" id="medicalHistory" name="medicalHistory" rows="4" placeholder="Masukkan riwayat penyakit" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer text-center">
            <strong>© 2024 Monitoring Detak Jantung</strong>
        </footer>
    </div>
    <!-- ./wrapper -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
</body>
</html>
