<?php

if (!isset($_GET['id']) || $_GET['id'] == '') {
    header('Location: index.php');
    exit();
}

require_once 'koneksi.php';

$id = $_GET['id'];
$sql = "UPDATE tbl_bukutamuint SET recheck_in = NOW() WHERE id = ? AND recheck_in IS NULL";
$stmt = $koneksi->prepare($sql);

// Bind the parameter
$stmt->bind_param("i", $id);

// Execute the statement
if ($stmt->execute()) {
    // If the update is successful, then show the SweetAlert
    ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Wait for the document to be fully loaded
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Proses Recheck In Berhasil',
                showConfirmButton: false,
                timer: 1500,
                target: document.body
            }).then(function () {
                window.location.href = 'list_bukutamu.php';
            });
        });
    </script>
    <?php
} else {
    // If the update fails, you can handle it here
    echo "Error updating record: " . $stmt->error;
}

// Close the statement
$stmt->close();

// Close the connection
$koneksi->close();

?>
