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
    <h3>Tentang Kami</h3>
    <p>Produk yang akan dibuat merupakan sebuah alat dan program Parking Management System 
        berbasis IOT dengan nama aplikasi "SParX". Produk ini adalah solusi canggih yang 
        dirancang untuk mengelola dan mengoptimalkan pengelolaan tempat parkir. Dengan adanya 
        aplikasi ini dapat mengetahui slot tersedia dan slot yang terisi pada suatu tempat 
        parkir yang memiliki sistem ini</p>
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