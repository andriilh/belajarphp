<?php 
	require 'functions.php';
	$id = isset($_GET["id"]) ? $_GET["id"] : '';
	// $id = $_GET["id"];


	if (hapus($id) > 0) {
		echo "
			<script>
				alert('data berhasil dihapus');
				document.location.href='index.php';
			</script>
		";
	} else{
		echo "	
			<script>
				document.location.href='index.php';
				alert('data gagal dihapus');
			</script>
		";
		// var_dump(mysqli_affected_rows($conn));
	}
?>