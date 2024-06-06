<?php
include "koneksi.php";

if (empty($_SESSION))
  session_start();

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit;
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>SParX</title>
  <link rel="stylesheet" type="text/css" href="styles.css" />
  <link rel="shortcut icon" href="images/parkir.png">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    .topnav {
      position: fixed;
      width: 100%;
      overflow: visible;
      z-index: 100;
    }

    .topnav li img {
      margin-left: 20px;
      margin-right: 20px;
    }

    .right {
      margin-right: 20px;
    }

    table {
      border-collapse: collapse;
      width: 100%;
      border: 1px solid black;
    }

    th,
    td {
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2
    }

    th {
      background-color: #B40404;
      color: white;
    }

    .data-entry {
      z-index: 1;
    }

    .data-entry h3 {
      font-size: 30px;
      padding-top: 30px;
    }

    .card_off {
      flex-direction: column;
      justify-content: center;
      align-items: center;
      display: flex;
      width: 300px;
      background: #f56464;
      border: 3px solid #B40404;
      border-radius: 8px;
      overflow: hidden;
      margin: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 0;
    }

    .card_off img {
      height: 150px;
      padding: 0;
      margin: 0;
      width: 150px;
      color: #fff;
    }

    .card_off h3 {
      height: 30px;
      font-size: 20px;
      padding: 0;
      margin: 0;
      color: #000;
    }

    .card_on {
      flex-direction: column;
      justify-content: center;
      align-items: center;
      display: flex;
      width: 300px;
      background: #72ed78;
      border: 3px solid #037009;
      border-radius: 8px;
      overflow: hidden;
      margin: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 0;
    }

    .card_on img {
      height: 150px;
      padding: 0;
      margin: 0;
      width: 150px;
      color: #fff;
    }

    .card_on h3 {
      height: 30px;
      font-size: 18px;
      padding: 0;
      margin: 0;
      color: #000;
    }

    .card-container {
      margin-top: -35px;
      display: flex;
      /* Membuat ruang seimbang antara card */
      justify-content: space-between;
      /* Memungkinkan untuk wrapping ke baris berikutnya jika tidak cukup ruang */
      flex-wrap: wrap;
    }
  </style>
</head>

<body>
  <ul class="topnav">
    <?php if ($_SESSION['level'] == 'admin') { ?>
      <li><img src="images/logo.png" width="50px" height="50px" /></li>
      <li><a href="home.php">Beranda</a></li>
      <li><a href="data-parkir.php">Parkir Mobil</a></li>
      <li><a href="data-parkir-motor.php">Parkir Motor</a></li>
      <li class="dropdown"><a href="javascript:void(0)" class="dropbtn">Grafik</a>
        <div class="dropdown-content">
          <a href="grafik.php">Rata-rata Kendaraan</a>
          <a href="total.php">Total Kendaraan</a>
        </div>
      </li>
      <li><a href="tentang.php">Tentang</a></li>
      <!-- <li class="dropdown"><a href="javascript:void(0)" class="dropbtn">Laporan</a>
        <div class="dropdown-content">
          <a href="log-parkir.php">Laporan Parkir</a>
          <a href="log-keuangan.php">Laporan Keuangan</a>
          <a href="log-aktifitas.php">Laporan Aktifitas</a>
        </div>
      </li>
      <li class="dropdown"><a href="javascript:void(0)" class="dropbtn">Mobil</a>
        <div class="dropdown-content">
          <a href="entry-mobil.php">Entry Mobil Masuk</a>
          <a href="mobilaktif.php">Data Mobil Aktif</a>
        </div>
      </li>
      <li class="dropdown"><a href="javascript:void(0)" class="dropbtn">Parkir</a>
        <div class="dropdown-content">
          <a href="tambah-parkir.php">Tambah Ruang Parkir</a>
          <a href="data-parkir.php">Parkir Mobil</a>
          <a href="data-parkir-motor.php">Parkir Motor</a>
        </div>
      </li>
      <li class="dropdown">
        <a href="javascript:void(0)" class="dropbtn">Pengaturan Karyawan</a>
        <div class="dropdown-content">
          <a href="tambah-karyawan.php">Buat Karyawan Baru</a>
          <a href="daftar-karyawan.php">Daftar Karyawan</a>
        </div>
      </li> -->

      <li class="right"><a href="logout.php">Logout</a></li>
      <li class="right">
        <font style="display: block;color: white;text-align: center;padding: 14px 16px;text-decoration: none;">
          <? echo "Welcome  " ?>
          <font style="color: #FA5882;">
            <? echo $_SESSION['namalengkap'] ?>
          </font>
        </font>
      </li>

    <?php }
    if ($_SESSION['level'] == 'kr') { ?>
      <li><a href="home.php">Beranda</a></li>
      <li class="dropdown"><a href="javascript:void(0)" class="dropbtn">Laporan</a>
        <div class="dropdown-content">
          <a href="log-parkir.php">Laporan Parkir</a>
        </div>
      </li>
      <li class="dropdown"><a href="javascript:void(0)" class="dropbtn">Parkir</a>
        <div class="dropdown-content">
          <a href="tambah-parkir.php">Tambah Ruang Parkir</a>
          <a href="data-parkir.php">Parkir Mobil</a>
          <a href="data-parkir-motor.php">Parkir Motor</a>
        </div>
      </li>

      <li class="right"><a href="logout.php">Logout</a></li>
      <li class="right">
        <font style="display: block;color: white;text-align: center;padding: 14px 16px;text-decoration: none;">
          <? echo "Welcome  " ?>
          <font style="color: #FA5882;">
            <? echo $_SESSION['namalengkap'] ?>
          </font>
        </font>
      </li>

    <?php }
    if ($_SESSION['level'] == 'kp1' || $_SESSION['level'] == 'kp2') { ?>

      <li><a href="home.php">Beranda</a></li>
      <li class="dropdown"><a href="javascript:void(0)" class="dropbtn">Laporan</a>
        <div class="dropdown-content">
          <a href="log-parkir.php">Laporan Parkir</a>
        </div>
      </li>
      <li class="dropdown"><a href="javascript:void(0)" class="dropbtn">Mobil</a>
        <div class="dropdown-content">
          <a href="entry-mobil.php">Entry Mobil Masuk</a>
          <a href="mobilaktif.php">Data Mobil Aktif</a>
        </div>
      </li>


      <li class="right"><a href="logout.php">Logout</a></li>
      <li class="right">
        <font style="display: block;color: white;text-align: center;padding: 14px 16px;text-decoration: none;">
          <? echo "Welcome  " ?>
          <font style="color: #FA5882;">
            <? echo $_SESSION['namalengkap'] ?>
          </font>
        </font>
      </li>
    <?php } ?>
  </ul>
  <div class="data-entry">
    <h3>Rata-Rata Jumlah Kendaraan 1 Minggu</h3>
    <canvas id="myChart" width="300" height="120"></canvas>
  </div>
</body>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');

    // Ganti URL dengan URL API yang sesuai
    var apiUrl = 'https://backendparkol-m77laoox7a-uc.a.run.app/average1';

    // Fetch data dari API
    fetch(apiUrl)
      .then(response => response.json())
      .then(data => {
        // Mengambil nilai dari properti 'data'
        var apiData = data.data;

        // Data untuk grafik
        var chartData = {
          labels: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
          datasets: [{
            label: 'Rata-rata Pengunjung per Hari',
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1,
            // Menggunakan nilai dari API
            data: [apiData.Minggu, apiData.Senin, apiData.Selasa, apiData.Rabu, apiData.Kamis, apiData.Jumat, apiData.Sabtu],
          }]
        };

        // Konfigurasi opsi grafik
        var options = {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        };

        // Buat objek grafik
        var myChart = new Chart(ctx, {
          type: 'bar',
          data: chartData,
          options: options
        });
      })
      .catch(error => console.error('Error fetching data:', error));
  </script>

</html>