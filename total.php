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
    <h3>Total Kendaraan</h3>
    <canvas id="totalChart" width="300" height="120"></canvas>
  </div>
</body>

<script>
     var ctx = document.getElementById('totalChart').getContext('2d');
  
  function fetchData(apiUrl) {
    return fetch(apiUrl)
      .then(response => {
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }
        return response.json();
      });
  }

  function updateChart() {
    var apiUrl1 = 'https://backendparkol-m77laoox7a-uc.a.run.app/total-kendaraan-lantai-1';
    var apiUrl2 = 'https://backendparkol-m77laoox7a-uc.a.run.app/total-kendaraan-lantai-2';

    Promise.all([fetchData(apiUrl1), fetchData(apiUrl2)])
      .then(dataArray => {
        var totalKendaraan1 = dataArray[0].totalKendaraan;
        var totalKendaraan2 = dataArray[1].totalKendaraan;

        var chartData = {
          labels: ['Total Kendaraan Lantai 1', 'Total Kendaraan Lantai 2'],
          datasets: [{
            label: 'Total Kendaraan',
            backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)'],
            borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)'],
            borderWidth: 1,
            data: [totalKendaraan1, totalKendaraan2],
          }]
        };

        var options = {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        };

        // Perbarui grafik
        if (myChart) {
          myChart.destroy(); // Hapus grafik sebelumnya jika sudah ada
        }
        myChart = new Chart(ctx, {
          type: 'bar',
          data: chartData,
          options: options
        });
      })
      .catch(error => console.error('Error fetching data:', error));
  }

  // Panggil updateChart setiap 5 detik
  var myChart; // Simpan objek grafik dalam variabel global
  setInterval(updateChart, 5000);

  // Panggil updateChart pertama kali saat halaman dimuat
  updateChart();

</script>

</html>