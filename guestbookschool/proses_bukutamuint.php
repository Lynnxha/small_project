<?php
require_once 'koneksi.php';

if (!isset($_POST['kirim'])) {
    header('Location: bukutamu.php');
}

date_default_timezone_set('Asia/Jakarta');

$tanggal = date('Y-m-d H:i:s');
$nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
$noidentitas = mysqli_real_escape_string($koneksi, $_POST['no_identitas']);
$email = mysqli_real_escape_string($koneksi, $_POST['email']);
$nohp = mysqli_real_escape_string($koneksi, $_POST['no_hp']);
$hubungan = mysqli_real_escape_string($koneksi, $_POST['hubungan']);
$tujuan = mysqli_real_escape_string($koneksi, $_POST['subjek']);

$query = mysqli_query($koneksi, "INSERT INTO tbl_bukutamuint (tgl_kunjung, nama, no_identitas, email, no_hp, hubungan, subjek) VALUES ('$tanggal', '$nama', '$noidentitas', '$email', '$nohp', '$hubungan', '$tujuan')");

if ($query) {
    ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Data Buku Tamu Anda Terkirim!',
                showConfirmButton: false,
                timer: 1500,
                target: document.body // Atur elemen target di sini
            }).then(function () {
                window.location.href = 'list_bukutamu.php';
            });
        });
    </script>
    <?php
} else {
    ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'error',
                title: 'Gagal Terkirim!',
                showConfirmButton: false,
                timer: 1500,
                target: document.body // Atur elemen target di sini
            }).then(function () {
                window.location.href = 'bukutamu.php';
            });
        });
    </script>
    <?php
}
?>