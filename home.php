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
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<style>
  .topnav {
    position: fixed;
    width: 100%;
    overflow: visible;
  }

  .topnav li img {
    margin-left: 20px;
    margin-right: 20px;
  }

  .right {
    margin-right: 20px;
  }

  .gambar {
    margin-top: 20px;
  }

  .card {
    width: 300px;
    background: #fff;
    border: 1px solid #000;
    border-radius: 8px;
    overflow: hidden;
    margin: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 0;
  }

  .card h3 {
    background: #B40404;
    height: 30px;
    justify-content: center;
    align-items: center;
    font-size: 18px;
    display: flex;
    padding: 0;
    margin: 0;
    color: #fff;
  }

  .card p {
    justify-content: center;
    display: flex;
    font-size: 30px;
    font-weight: bold;
  }

  .card-container {
    display: flex;
    justify-content: space-between;
    /* Membuat ruang seimbang antara card */
    flex-wrap: wrap;
    /* Memungkinkan untuk wrapping ke baris berikutnya jika tidak cukup ruang */
  }
</style>

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
  <div>
    <center><img class="gambar" src="images/home.png" / width="40%" height="40%"></center>
    <?php
    $query_mysql = mysqli_query($connect, "SELECT * FROM parkir");
    $nomor = 0;
    $ruangisi = 0;
    $ruangtakisi = 0;
    while ($data = mysqli_fetch_array($query_mysql)) {

      $nomor = $nomor + 1;
      if ($data['status'] == '1') {
        $ruangtakisi = $ruangtakisi + 1;
      } else {
        $ruangisi = $ruangisi + 1;
      }
    } ?>
    <div class="card-container">
      <div class="card">
        <h3>Slot Terisi Mobil</h3>
        <p id="mobil">
          0
        </p>
      </div>
      <div class="card">
        <h3>Slot Terisi Motor</h3>
        <p id="motor">
          0
        </p>
      </div>
      <div class="card">
        <h3>Jumlah Kendaraan</h3>
        <p id="jumlah">
          0
        </p>
      </div>
    </div>
    <div class="card-container">
      <div class="card">
        <h3>Pendapatan Mobil</h3>
        <p id="tanggal_mobil">
          1/1/2024
        </p>
        <p id="jumlah_mobil">
          0
        </p>
      </div>
      <div class="card">
        <h3>Pendapatan Motor</h3>
        <p id="tanggal_motor">
          1/1/2024
        </p>
        <p id="jumlah_motor">
          0
        </p>
      </div>
    </div>

  </div>
</body>

<script>
  function slotMobil() {
        $.ajax({
            url: 'https://backendparkol-m77laoox7a-uc.a.run.app/total-kendaraan-lantai-1',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data && data['totalKendaraan'] !== undefined) {
                    // Parse the value as float and format it with two decimal places
                    var slotMobil = data['totalKendaraan'];
                    $('#mobil').html(slotMobil);
                } else {
                    console.error('Format data tidak sesuai atau nilai total kendaraan tidak tersedia.');
                }
            },
            error: function() {
                console.error('Gagal melakukan AJAX request');
            }
        });
    }
    setInterval(slotMobil, 1000);

    function slotMotor() {
        $.ajax({
            url: 'https://backendparkol-m77laoox7a-uc.a.run.app/total-kendaraan-lantai-2',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data && data['totalKendaraan'] !== undefined) {
                    // Parse the value as float and format it with two decimal places
                    var slotMobil = data['totalKendaraan'];
                    $('#motor').html(slotMobil);
                } else {
                    console.error('Format data tidak sesuai atau nilai total kendaraan tidak tersedia.');
                }
            },
            error: function() {
                console.error('Gagal melakukan AJAX request');
            }
        });
    }
    setInterval(slotMotor, 1000);

    function updateTotalKendaraan() {
    // Define the URLs for the two APIs
    var url1 = 'https://backendparkol-m77laoox7a-uc.a.run.app/total-kendaraan-lantai-1';
    var url2 = 'https://backendparkol-m77laoox7a-uc.a.run.app/total-kendaraan-lantai-2';

    // Use $.when to make asynchronous requests to both APIs
    $.when(
      $.ajax({
        url: url1,
        method: 'GET',
        dataType: 'json'
      }),
      $.ajax({
        url: url2,
        method: 'GET',
        dataType: 'json'
      })
    ).done(function (data1, data2) {
      // Check if both requests were successful
      if (data1[0] && data1[0]['totalKendaraan'] !== undefined &&
          data2[0] && data2[0]['totalKendaraan'] !== undefined) {

        // Sum the total from both APIs
        var totalKendaraan = data1[0]['totalKendaraan'] + data2[0]['totalKendaraan'];

        // Update the HTML element with the total
        $('#jumlah').html(totalKendaraan);
      } else {
        console.error('Format data tidak sesuai atau nilai total kendaraan tidak tersedia.');
      }
    }).fail(function () {
      console.error('Gagal melakukan AJAX request');
    });
  }

  // Call the function initially and then at regular intervals
  updateTotalKendaraan();
  setInterval(updateTotalKendaraan, 1000);

  function pendapatanMobil() {
    $.ajax({
      url: 'https://backendparkol-m77laoox7a-uc.a.run.app/totalpengunjung-hari/mobil',
      method: 'GET',
      dataType: 'json',
      success: function(data) {
        if (data && data.data !== undefined) {
          var tanggalMobil = data.data.tanggal;
          $('#tanggal_mobil').html(tanggalMobil);

          var jumlahMobil = data.data.total_harga;
          $('#jumlah_mobil').html(jumlahMobil);
        } else {
          console.error('Format data tidak sesuai atau nilai tidak tersedia.');
        }
      },
      error: function() {
        console.error('Gagal melakukan AJAX request');
      }
    });
  }

  // Setiap 1000 milidetik (1 detik), panggil fungsi pendapatanMobil
  setInterval(pendapatanMobil, 1000);

  // Panggil fungsi pendapatanMobil untuk pertama kali saat halaman dimuat
  pendapatanMobil();

    // Call the function initially and then at regular intervals
    updateTotalKendaraan();
  setInterval(updateTotalKendaraan, 1000);

  function pendapatanMotor() {
    $.ajax({
      url: 'https://backendparkol-m77laoox7a-uc.a.run.app/totalpengunjung-hari/motor',
      method: 'GET',
      dataType: 'json',
      success: function(data) {
        if (data && data.data !== undefined) {
          var tanggalMobil = data.data.tanggal;
          $('#tanggal_motor').html(tanggalMobil);

          var jumlahMobil = data.data.total_harga;
          $('#jumlah_motor').html(jumlahMobil);
        } else {
          console.error('Format data tidak sesuai atau nilai tidak tersedia.');
        }
      },
      error: function() {
        console.error('Gagal melakukan AJAX request');
      }
    });
  }

  // Setiap 1000 milidetik (1 detik), panggil fungsi pendapatanMobil
  setInterval(pendapatanMotor, 1000);

  // Panggil fungsi pendapatanMobil untuk pertama kali saat halaman dimuat
  pendapatanMotor();
</script>

</html>