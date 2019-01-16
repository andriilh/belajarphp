<?php 
	//koneksi ke database
	$conn = mysqli_connect("localhost","root","","belajarphp");

	function query($query){
		global $conn;
		$result = mysqli_query($conn,$query);
		$rows = [];
		while($row = mysqli_fetch_assoc($result)){
			$rows[]=$row;
		}
		return $rows;
	}


	// Tambah data
	function tambah($data){
		global $conn;

		// ambil datta dari setiap elemen post
		$npm = htmlspecialchars($data["npm"]); //agar inputan berupa tag html tidak dijalankan
		$nama =  htmlspecialchars($data["nama"]);
		$email =  htmlspecialchars($data["email"]);
		$jurusan =  htmlspecialchars($data["jurusan"]);


		//upload gambar
		$gambar = upload();
		if(!$gambar){
			return true;
		}

		//query insert data
		$sql = "INSERT INTO mahasiswa values('','$npm','$nama','$email','$jurusan')";
		mysqli_query($conn, $sql);
		return mysqli_affected_rows($conn);
	}

	function upload(){
		return false;
	}


	function hapus($id){
		global $conn;
		mysqli_query($conn,"DELETE FROM mahasiswa WHERE id = '$id'");

		return mysqli_affected_rows($conn);
	}

	function ubah($data){
		global $conn;
		// ambil datta dari setiap elemen post
		$id = $data["id"];
		$npm = htmlspecialchars($data["npm"]); //agar inputan berupa tag html tidak dijalankan
		$nama =  htmlspecialchars($data["nama"]);
		$email =  htmlspecialchars($data["email"]);
		$jurusan =  htmlspecialchars($data["jurusan"]);

		//query insert data
		$sql = "UPDATE mahasiswa SET
				npm = '$npm',
				nama = '$nama',
				email = '$email',
				jurusan = '$jurusan'
				WHERE id = $id";
		mysqli_query($conn, $sql);
		return mysqli_affected_rows($conn);
	}

	function cari($keyword){
		$query = "SELECT * FROM mahasiswa WHERE
				nama LIKE '%$keyword%' OR
				npm LIKE '%$keyword%' OR
				jurusan LIKE '%$keyword%' OR
				email LIKE '%$keyword%'
				";
		return query($query);
	}
?>