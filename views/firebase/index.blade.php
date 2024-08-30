<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring Heartbeat</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
    <script src="https://www.gstatic.com/firebasejs/8.3.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.0/firebase-database.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns"></script>
    <style>
        .content-header {
            margin-bottom: 20px;
        }

        .info-box .info-box-icon {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .chart {
            margin-top: 20px;
        }

        .btn-container {
            margin-top: 20px;
            text-align: center;
        }

        .patient-info {
            margin-top: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 10px;
        }

        .button-group {
            margin-top: 20px;
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
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/" class="nav-link">Home</a>
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
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Data Pasien
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/pasien" class="nav-link">
                                        <i class="fas fa-history nav-icon"></i>
                                        <p>Data Pasien Lama</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/inputdata" class="nav-link">
                                        <i class="fas fa-user-plus nav-icon"></i>
                                        <p>Data Pasien Baru</p>
                                    </a>
                                </li>
                            </ul>
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
                            <h1>Dashboard</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12">
                            <h5>Pasien yang dipilih: <span id="selectedPatientName">Belum ada</span></h5>
                            <div id="patientInfo" class="patient-info" style="display: none;">
                                <p><strong>Nama:</strong> <span id="patientName">-</span></p>
                                <p><strong>Alamat:</strong> <span id="patientAlamat">-</span></p>
                                <p><strong>Riwayat Penyakit:</strong> <span id="patientMedicalHistory">-</span></p>
                            </div>
                            <div class="button-group">
                                <button class="btn btn-primary" onclick="$('#selectPatientModal').modal('show')">Pilih
                                    Pasien</button>
                                <button class="btn btn-secondary" onclick="printPDF()">Cetak PDF</button>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Info boxes -->
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-heartbeat"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Heart Rate (BPM)</span>
                                    <span class="info-box-number" id="bpm">
                                        <span class="loader"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-heart"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Status</span>
                                    <span class="info-box-number" id="status">
                                        <span class="loader"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-12 connectedSortable">
                            <!-- BPM Chart -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Grafik BPM</h3>
                                </div>
                                <div class="card-body">
                                    <div class="chart">
                                        <canvas id="bpmChart" width="700" height="700"></canvas>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </section>
                        <!-- /.Left col -->
                    </div>
                    <!-- /.row (main row) -->

                    <!-- Button Lihat Data Pasien -->
                    <div class="btn-container">
                        <a href="/pasien" class="btn btn-primary">Lihat Data Pasien</a>
                    </div>
                </div><!-- /.container-fluid -->
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

    <!-- Modal Pilih Pasien -->
    <div class="modal fade" id="selectPatientModal" tabindex="-1" role="dialog"
        aria-labelledby="selectPatientModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="selectPatientModalLabel">Pilih Pasien</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="patientSelect">Pilih Pasien:</label>
                        <select class="form-control" id="patientSelect">
                            <!-- Daftar pasien akan dimuat di sini -->
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="selectPatient()">Pilih</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns"></script>
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

        var selectedPatient = null;

        // Fungsi untuk memuat daftar pasien dari Firebase
        function loadPatients() {
            var patientSelect = document.getElementById('patientSelect');
            patientSelect.innerHTML = ''; // Kosongkan daftar pasien

            firebase.database().ref('/patients').once('value', function(snapshot) {
                snapshot.forEach(function(childSnapshot) {
                    var patient = childSnapshot.val();
                    var option = document.createElement('option');
                    option.value = childSnapshot.key;
                    option.textContent = patient.nik;
                    patientSelect.appendChild(option);
                });
            });
        }

        // Fungsi untuk menangani pemilihan pasien
        function selectPatient() {
            var patientSelect = document.getElementById('patientSelect');
            selectedPatient = patientSelect.value;
            if (selectedPatient) {
                $('#selectPatientModal').modal('hide');
                firebase.database().ref('/patients/' + selectedPatient).once('value').then(function(snapshot) {
                    var patient = snapshot.val();
                    document.getElementById('selectedPatientName').textContent = patient.nik;
                    document.getElementById('patientName').textContent = patient.name;
                    document.getElementById('patientAlamat').textContent = patient.alamat;
                    document.getElementById('patientMedicalHistory').textContent = patient.medicalHistory;
                    document.getElementById('patientInfo').style.display = 'block';
                });
                // Kirim ID pasien ke NodeMCU
                fetch('http://192.168.103.199/setPatientId', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: new URLSearchParams({
                            'patientId': selectedPatient
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            console.log("Patient ID sent successfully.");
                        } else {
                            console.error("Error sending patient ID:", data.error);
                        }
                    })
                    .catch(error => {
                        console.error("Network error:", error);
                    });

                loadPatientData(selectedPatient);
            } else {
                alert('Pilih pasien terlebih dahulu!');
            }
        }

        // Fungsi untuk memuat data pasien yang dipilih
        function loadPatientData(patientId) {
            var bpmRef = firebase.database().ref('/patients/' + patientId + '/bpm');
            var statusRef = firebase.database().ref('/patients/' + patientId + '/status');
            var bpmDataRef = firebase.database().ref('/patients/' + patientId + '/sensorData');

            var sensorValues = [];
            var timestamps = [];
            var lastTimestamp = 0; // Track the latest timestamp

            bpmRef.on('value', function(snapshot) {
                var bpm = snapshot.val();
                document.getElementById('bpm').textContent = bpm ? bpm + ' BPM' : 'Data tidak tersedia';
            }, function(error) {
                alert('Terjadi kesalahan saat mengakses data BPM: ' + error.message);
            });

            statusRef.on('value', function(snapshot) {
                var status = snapshot.val();
                document.getElementById('status').textContent = status ? status : 'Data tidak tersedia';
            }, function(error) {
                alert('Terjadi kesalahan saat mengakses data Status: ' + error.message);
            });

            bpmDataRef.on('value', function(snapshot) {
                snapshot.forEach(function(childSnapshot) {
                    var childData = childSnapshot.val();
                    var timestamp = new Date(childData.timestamp);
                    if (timestamp > lastTimestamp) { // Only add new data points
                        sensorValues.push(childData.sensorValue);
                        timestamps.push(timestamp);
                        lastTimestamp = timestamp;
                    }
                });

                // Append new data while limiting to the last 30 entries
                if (timestamps.length > 200) {
                    timestamps = timestamps.slice(-200);
                    sensorValues = sensorValues.slice(-200);
                }

                bpmChart.data.labels = timestamps;
                bpmChart.data.datasets[0].data = sensorValues;

                bpmChart.update();
            });
        }

        // Fungsi untuk mencetak PDF menggunakan jsPDF
        function printPDF() {
            var {
                jsPDF
            } = window.jspdf;

            var doc = new jsPDF();

            var patientName = document.getElementById('selectedPatientName').textContent;
            var bpm = document.getElementById('bpm').textContent;
            var status = document.getElementById('status').textContent;

            doc.text("Data Monitoring Detak Jantung", 10, 10);
            doc.text("Pasien: " + patientName, 10, 20);
            doc.text("BPM: " + bpm, 10, 30);
            doc.text("Status: " + status, 10, 40);

            // Tambahkan grafik ke PDF
            var canvas = document.getElementById('bpmChart');
            var imgData = canvas.toDataURL('image/png');
            doc.addImage(imgData, 'PNG', 10, 50, 180, 90);

            doc.save("monitoring_detak_jantung.pdf");
        }

        // Tampilkan modal pemilihan pasien saat halaman dimuat jika belum ada pasien yang dipilih
        $(document).ready(function() {
            loadPatients();
            if (!selectedPatient) {
                $('#selectPatientModal').modal('show');
            }
        });

        // Grafik BPM
        var ctx = document.getElementById('bpmChart').getContext('2d');
        var bpmChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [], // Update dengan timestamp atau label lain sesuai kebutuhan
                datasets: [{
                    label: 'Grafik ECG',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderWidth: 2,
                    pointRadius: 0,
                    pointBackgroundColor: 'rgba(54, 162, 235, 1)',
                    lineTension: 0.1 // Smooth the line
                }]
            },
            options: {
                animation: false, // Disable animation for real-time updates
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        display:true,
                        type: 'time',
                        time: {
                            unit: 'second',
                            tooltipFormat: 'll HH:mm:ss',
                            displayFormats: {
                                second: 'HH:mm:ss'
                            },
                            // reverse: true // Menampilkan dari kanan ke kiri
                        },
                        title: {
                            display: false,
                            text: 'Time',
                            color: '#333',
                            font: {
                                family: 'Arial',
                                size: 14,
                                weight: 'bold'
                            }
                        },
                        ticks: {
                            color: '#666',
                            font: {
                                family: 'Arial',
                                size: 12
                            }
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Grafik ECG',
                            color: '#333',
                            font: {
                                family: 'Arial',
                                size: 14,
                                weight: 'bold'
                            }
                        },
                        ticks: {
                            color: '#666',
                            font: {
                                family: 'Arial',
                                size: 12
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        labels: {
                            color: '#333',
                            font: {
                                family: 'Arial',
                                size: 14,
                                weight: 'bold'
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>

</html>
