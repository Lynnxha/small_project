<?php 
require_once 'koneksi.php';
$aktif = 'list_bukutamu'; 
$query1 = mysqli_query($koneksi, "SELECT * FROM tbl_bukutamuint");
$query2 = mysqli_query($koneksi, "SELECT * FROM tbl_bukutamuext");
$no = 1;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Buku Tamu - <?= $title ?></title>
	<link rel="stylesheet" href="resources/fonts/stylesheet.css">
	<link rel="stylesheet" href="resources/css/bootstrap.min.css">
	<link rel="stylesheet" href="resources/css/style.css">
    <link rel="stylesheet" href="resources/datatables/datatables.min.css">
	<link rel="shortcut icon" href="https://smkpgri3-malang.sch.id/websekolah/wp-content/uploads/2022/06/cropped-logo-smk-1-192x192.png" type="image/x-icon">
</head>
<body>

		<?php require_once 'header.php' ?>	
			
		<!-- nav bar -->
		<?php require_once 'navbar.php'; ?>

    <div class="container mt-3">
            <!-- Internal -->
            <div class="row">
                <div class="row p-3">
                    <div class="col">
                        <div class="card shadow">
                            <div class="card-header">
                                <div class="clearfix">
                                    <div class="float-left">
                                        Daftar Bukutamu Internal
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <?php if(isset($_SESSION['sukses'])) : ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Berhasil!</strong> <?= $_SESSION['sukses'] ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php unset($_SESSION['sukses']) ?>
                                <?php elseif(isset($_SESSION['gagal'])) : ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Gagal!</strong> <?= $_SESSION['gagal'] ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php unset($_SESSION['gagal']) ?>
                                <?php endif; ?>
                                <table id="table_id" class="dataTable table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal Kunjung</th>
                                            <th>Nama</th>
                                            <th>No Identitas</th>
                                            <th>Email</th>
                                            <th>No Hp</th>
                                            <th>Hubungan Dgn Sekolah</th>
                                            <th>Tujuan</th>
                                            <th>Tanggal Checkout</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($row = mysqli_fetch_assoc($query1)) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= date('d F Y H:i:s', strtotime($row['tgl_kunjung'])) ?></td>
                                                <td><?= $row['nama'] ?></td>
                                                <td><?= $row['no_identitas'] ?></td>
                                                <td><?= $row['email'] ?></td>
                                                <td><?= $row['no_hp'] ?></td>
                                                <td><?= $row['hubungan'] ?></td>
                                                <td><?= $row['subjek'] ?></td>
                                                <td>
                                                    <?php
                                                    if ($row['jam_checkout'] !== null) {
                                                        echo date('d F Y H:i:s', strtotime($row['jam_checkout']));
                                                    } else {
                                                        echo 'Tidak Ada';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <a href="<?= ($row['jam_checkout'] !== null) ? '#' : 'proses_checkoutint.php?id=' . $row['id'] ?>" class="btn btn-sm btn-danger<?= ($row['jam_checkout'] !== null) ? ' disabled' : '' ?>">Checkout</a>
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- External -->
            <div class="row">
                <div class="row p-3">
                    <div class="col">
                        <div class="card shadow">
                            <div class="card-header">
                                <div class="clearfix">
                                    <div class="float-left">
                                        Daftar Bukutamu External
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <?php if(isset($_SESSION['sukses'])) : ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Berhasil!</strong> <?= $_SESSION['sukses'] ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php unset($_SESSION['sukses']) ?>
                                <?php elseif(isset($_SESSION['gagal'])) : ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Gagal!</strong> <?= $_SESSION['gagal'] ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php unset($_SESSION['gagal']) ?>
                                <?php endif; ?>
                                <table id="table_id2" class="dataTable table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal Kunjung</th>
                                            <th>Nama</th>
                                            <th>No Identitas</th>
                                            <th>Email</th>
                                            <th>No Hp</th>
                                            <th>Hubungan Dgn Sekolah</th>
                                            <th>Tujuan</th>
                                            <th>Tanggal Checkout</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($row = mysqli_fetch_assoc($query2)) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= date('d F Y H:i:s', strtotime($row['tgl_kunjung'])) ?></td>
                                                <td><?= $row['nama'] ?></td>
                                                <td><?= $row['no_identitas'] ?></td>
                                                <td><?= $row['email'] ?></td>
                                                <td><?= $row['no_hp'] ?></td>
                                                <td><?= $row['instansi'] ?></td>
                                                <td><?= $row['subjek'] ?></td>
                                                <td>
                                                    <?php
                                                    if ($row['jam_checkout'] !== null) {
                                                        echo date('d F Y H:i:s', strtotime($row['jam_checkout']));
                                                    } else {
                                                        echo 'Tidak Ada';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <a href="<?= ($row['jam_checkout'] !== null) ? '#' : 'proses_checkoutext.php?id=' . $row['id'] ?>" class="btn btn-sm btn-danger<?= ($row['jam_checkout'] !== null) ? ' disabled' : '' ?>">Checkout</a>
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require_once 'footer.php'; ?>