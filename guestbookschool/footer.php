<div class="text-white footer">
			<?= date('Y') ?> © Copyright All Right Reserved.
		</div>
	</div>

	<script src="resources/js/jquery.js"></script>
	<script src="resources/js/bootstrap.min.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>
		// Fungsi untuk menampilkan SweetAlert2 Internal
		function showSweetAlert(formId, successUrl) {
			Swal.fire({
				title: "Do you want to save the changes?",
				showDenyButton: true,
				showCancelButton: true,
				confirmButtonText: "Save",
				denyButtonText: `Don't save`
			}).then((result) => {
				if (result.isConfirmed) {
					Swal.fire("Saved!", "", "success");
					// Submit the form
					document.getElementById(formId).submit();
					// Redirect to the specified URL after submission
					window.location.href = successUrl;
				} else if (result.isDenied) {
					Swal.fire({
						title: 'Changes not saved',
						text: 'Are you sure you want to discard the changes?',
						icon: 'warning',
						showCancelButton: true,
						confirmButtonText: 'Yes, discard changes!',
						cancelButtonText: 'No, keep editing'
					}).then((result) => {
						if (result.isConfirmed) {
							Swal.fire('Changes discarded!', '', 'info');
							document.getElementById(formId).reset();
						}
					});
				}
			});
		}

		// Pastikan elemen dengan id 'btnKirim' ada di DOM sebelum menambahkan event listener
		document.addEventListener('DOMContentLoaded', function () {
			document.getElementById('btnKirim').addEventListener('click', function (event) {
				console.log("Button clicked"); 
				event.preventDefault();
				showSweetAlert('myFormInternal', 'list_bukutamu.php');
			});
		});
	</script>

	<script>
	// Fungsi untuk menampilkan SweetAlert2 external
	function showSweetAlert(formId, successUrl) {
		Swal.fire({
			title: "Do you want to save the changes?",
			showDenyButton: true,
			showCancelButton: true,
			confirmButtonText: "Save",
			denyButtonText: `Don't save`
		}).then((result) => {
			if (result.isConfirmed) {
				Swal.fire("Saved!", "", "success");
				document.getElementById(formId).submit();
			} else if (result.isDenied) {
				Swal.fire({
					title: 'Changes not saved',
					text: 'Are you sure you want to discard the changes?',
					icon: 'warning',
					showCancelButton: true,
					confirmButtonText: 'Yes, discard changes!',
					cancelButtonText: 'No, keep editing'
				}).then((result) => {
					if (result.isConfirmed) {
						Swal.fire('Changes discarded!', '', 'info');
						// Clear the form
						document.getElementById(formId).reset();
					}
				});
			}
		});
	}

	document.getElementById('btnKirimext').addEventListener('click', function (event) {
		event.preventDefault();
		showSweetAlert('myFormExternal', 'list_bukutamu.php');
	});
	</script>

	<script>
		$(document).ready(function () {
			$('#table_id2').DataTable({
				pageLength: 5,
				lengthMenu: [[5, 10, 20], [5, 10, 20]],
			});
		});
	</script>
	

	<script src="resources/js/jquery.js"></script>
	<script src="resources/js/bootstrap.min.js"></script>
	<script src="resources/datatables/datatables.min.js"></script>
	<script src="resources/datatables/datatable.js"></script>
</body>
</html>