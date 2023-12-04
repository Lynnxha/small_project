<?php 
require_once '../koneksi.php';
require_once 'cek_session.php';

$query1 = mysqli_query($koneksi, "SELECT * FROM tbl_bukutamuint");
$query2 = mysqli_query($koneksi, "SELECT * FROM tbl_bukutamuext");
$no = 1;
$no2 = 1;
$active = 'bukutamu';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Data Bukutamu - <?=$title ?></title>
	<link rel="stylesheet" href="../resources/datatables/datatables.min.css">
	<link rel="stylesheet" href="../resources/css/bootstrap.min.css">
</head>
<body>
	<?php require_once 'navbar.php'; ?>
	<!-- Data Tamu Internal -->
	<div class="container mt-3">
		<div class="row">
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
									<th>Hubungan</th>
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
										<td><?= date('d F Y H:i:s', strtotime($row['jam_checkout'])) ?></td>
						        		<td>
						        			<a href="hapus_bukutamu.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin?')">Hapus</a>
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

	<!-- Data Tamu External -->
	<div class="container mt-5">
		<div class="row">
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
									<th>Instansi</th>
						            <th>Tujuan</th>
						            <th>Aksi</th>
						        </tr>
						    </thead>
						    <tbody>
						        <?php while($row = mysqli_fetch_assoc($query2)) : ?>
						        	<tr>
						        		<td><?= $no2++ ?></td>
										<td><?= date('d F Y H:i:s', strtotime($row['tgl_kunjung'])) ?></td>
						        		<td><?= $row['nama'] ?></td>
										<td><?= $row['no_identitas'] ?></td>
						        		<td><?= $row['email'] ?></td>
										<td><?= $row['no_hp'] ?></td>
										<td><?= $row['instansi'] ?></td>
						        		<td><?= $row['subjek'] ?></td>
						        		<td>
						        			<a href="hapus_bukutamu.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin?')">Hapus</a>
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
	<script src="../resources/js/jquery.js"></script>
	<script src="../resources/js/bootstrap.min.js"></script>
	<script src="../resources/datatables/datatables.min.js"></script>
	<script src="../resources/datatables/datatable.js"></script>
	<script>
		$(document).ready(function () {
			$('#table_id2').DataTable({
				pageLength: 5,
				lengthMenu: [[5, 10, 20], [5, 10, 20]],
			});
		});
	</script>
</body>
</html>