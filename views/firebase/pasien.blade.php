<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pasien</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
    <style>
        body {
            background: url('images/bg1.png') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Arial', sans-serif;
            color: #333;
        }
        .table-container {
            margin-top: 20px;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .table th, .table td {
            border: 1px solid #dee2e6;
            padding: 15px;
        }
        .table thead th {
            background-color: #31c2e2;
            color: white;
            text-align: center;
        }
        .table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .table tbody tr:hover {
            background-color: #e9ecef;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 1em;
            color: #777;
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
                            <h1>Data Pasien Lama</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                                <li class="breadcrumb-item active">Data Pasien Lama</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="table-container">
                        <div class="input-group mb-3">
                            <input type="text" id="searchInput" class="form-control" placeholder="Cari berdasarkan nama pasien...">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" onclick="searchPatient()">Cari</button>
                            </div>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Alamat</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Riwayat Penyakit</th>
                                    <th>BPM</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="patientTable">
                                <!-- Data pasien akan dimuat di sini oleh JavaScript -->
                            </tbody>
                        </table>
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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.0/firebase-database.js"></script>
    <script>
        // Konfigurasi Firebase
        var firebaseConfig = {
            apiKey: "AIzaSyChUzQnM8LGPg6kN3WPH5O1ysdYNcTDxJ8",
            authDomain: "tugasakhir8266.firebaseapp.com",
            databaseURL: "https://tugasakhir8266-default-rtdb.asia-southeast1.firebasedatabase.app",
            projectId: "tugasakhir8266",
            storageBucket: "tugasakhir8266.appspot.com",
            messagingSenderId: "840598560967",
            appId: "1:840598560967:web:9f13f96073bfd9eca89ee2"
        };

        // Inisialisasi Firebase
        firebase.initializeApp(firebaseConfig);

        // Fungsi untuk memuat data pasien dari Firebase
        function loadPatients() {
            var patientTable = document.getElementById('patientTable');
            patientTable.innerHTML = ''; // Kosongkan tabel pasien

            firebase.database().ref('/patients').once('value', function(snapshot) {
                snapshot.forEach(function(childSnapshot) {
                    var patient = childSnapshot.val();
                    var row = document.createElement('tr');

                    row.innerHTML = `
                        <td>${patient.name}</td>
                        <td>${patient.nik || 'Tidak tersedia'}</td>
                        <td>${patient.alamat || 'Tidak tersedia'}</td>
                        <td>${patient.birthdate || 'Tidak tersedia'}</td>
                        <td>${patient.gender === 'male' ? 'Laki-laki' : 'Perempuan'}</td>
                        <td>${patient.medicalHistory}</td>
                        <td>${patient.bpm || 'Tidak tersedia'}</td>
                        <td>${patient.status || 'Tidak tersedia'}</td>
                        <td>
                            <button class="btn btn-danger btn-sm" onclick="deletePatient('${childSnapshot.key}')">Hapus</button>
                        </td>
                    `;

                    patientTable.appendChild(row);
                });
            });
        }

        // Fungsi untuk mencari pasien berdasarkan nama
        function searchPatient() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById('searchInput');
            filter = input.value.toLowerCase();
            table = document.getElementById('patientTable');
            tr = table.getElementsByTagName('tr');

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName('td')[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toLowerCase().indexOf(filter) > -1) {
                        tr[i].style.display = '';
                    } else {
                        tr[i].style.display = 'none';
                    }
                }       
            }
        }

        // Fungsi untuk menghapus data pasien
        function deletePatient(patientId) {
            if (confirm('Apakah Anda yakin ingin menghapus data pasien ini?')) {
                firebase.database().ref('/patients/' + patientId).remove()
                    .then(function() {
                        alert('Data pasien berhasil dihapus.');
                        loadPatients(); // Muat ulang data pasien
                    })
                    .catch(function(error) {
                        alert('Terjadi kesalahan saat menghapus data pasien: ' + error.message);
                    });
            }
        }

        // Muat data pasien saat halaman dimuat
        $(document).ready(function() {
            loadPatients();
        });
    </script>
</body>
</html>
