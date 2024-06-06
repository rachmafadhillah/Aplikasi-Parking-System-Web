<?php
include "koneksi.php";
if(empty($_SESSION))
   session_start();

if(!isset($_SESSION['username'])) {
   header("Location: login.php");
   exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>CakMans Member Area</title>
<link rel="stylesheet" type="text/css" href="styles.css"/>
<style>
  .topnav {
    position: fixed;
    width: 100%;
    overflow:visible;
  }
  .topnav li img {
    margin-left: 20px;
    margin-right: 20px;
  }
  .right {
    margin-right: 20px;
  }
table {
  margin-top: 70px;
  border-collapse: collapse;
  width: 100%;
  border: 1px solid black;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #B40404;
  color: white;
}

</style>
<link rel="shortcut icon" href="images/parkir.png">
</head>
<body>
<ul class="topnav">
	<?php if($_SESSION['level'] == 'admin'){ ?>
  <li><img src="images/logoku.png" width="80px" height="50px"/></li>
  <li><a href="home.php">Beranda</a></li>
  <li class="dropdown"><a href="javascript:void(0)" class="dropbtn">Laporan</a>
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
    </li>


    <li class="right"><a href="logout.php">Logout</a></li>
    <li class="right"><font style="display: block;color: white;text-align: center;padding: 14px 16px;text-decoration: none;"><? echo "Welcome  "?><font style="color: #FA5882;"><? echo $_SESSION['namalengkap'] ?></font></font></li>

  <?php }if($_SESSION['level'] == 'kr'){ ?>
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
      <li class="right"><font style="display: block;color: white;text-align: center;padding: 14px 16px;text-decoration: none;"><? echo "Welcome  "?><font style="color: #FA5882;"><? echo $_SESSION['namalengkap'] ?></font></font></li>

<?php }if($_SESSION['level'] == 'kp1' || $_SESSION['level'] == 'kp2'){?>

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
    <li class="right"><font style="display: block;color: white;text-align: center;padding: 14px 16px;text-decoration: none;"><? echo "Welcome  "?><font style="color: #FA5882;"><? echo $_SESSION['namalengkap'] ?></font></font></li>
    <?php }?>
  </ul>
<div>
  <table class="table" height=90% width=90% align=center>
		<tr>
			<th>No</th>
      <th>Jenis</th>
			<th>Waktu Masuk</th>
      <th>Waktu Keluar</th>
			<th>Slot</th>
			<th>Status</th>
		</tr>
		<?php
		$query_mysql = mysqli_query($connect,"SELECT * FROM tbmobil");
		$nomor = 1;
		while($data = mysqli_fetch_array($query_mysql)){

		?>
		<tr>
			<td><?php echo $nomor++; ?></td>
      <td><?php echo $data['jenis']; ?></td>
			<td><?php echo $data['waktu_masuk']; ?></td>
			<td><?php echo $data['waktu_keluar']; ?></td>
			<td><?php echo $data['slot']; ?></td>
      <td><?php echo $data['status']; ?></td>
		</tr>
		<?php } ?>
	</table>
</div>
</body>
</html>
