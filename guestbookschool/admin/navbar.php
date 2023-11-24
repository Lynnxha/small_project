<?php
require_once 'cek_session.php';
$base_url = "http://localhost/guestbookschool/";
?>

<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link <?= $active == 'dashboard' ? 'active' : '' ?>" href="<?= $base_url ?>admin">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $active == 'bukutamu' ? 'active' : '' ?>" href="<?= $base_url ?>admin/bukutamu.php">Bukutamu</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= $base_url ?>" target="_blank">Lihat Website</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="<?= $base_url ?>admin/logout.php" onclick="return confirm('apakah anda yakin?')"><i class="bx bx-exit"></i> Logout</a>
        </li>
    </ul>
</nav>
