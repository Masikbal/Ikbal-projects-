<html>
<head>
	<title>Pemrograman Berorientasi Objek</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<style type="text/css">
		body{
			background-color: powderblue !important;
		}
		form{
			font-size: 25px;
			color: white;
			background: #2F495A;
			margin: 10px auto;
			padding: 50px 20px 50px 20px;
			border-radius: 5px;
		}
		table {
			background: #2F495A;	
			color: white;
			width: 600px;  
			padding: 10px 10px 50px 10px;
		}
	</style>
</head>
<body>
	<?php
	$database = new mysqli('localhost','root','','universitas');
	if($database->connect_errno){
		echo"Database Tidak Dapat Terhubung";
	}
	if(isset($_POST['simpan'])){
		$nidn = $_POST['nidn'];
		$nama = $_POST['nama'];
		$jabatan = $_POST['jabatan'];
		$alamat = $_POST['alamat'];
		$no_tlp = $_POST['no_tlp'];
		

		$sql= "INSERT INTO dosen VALUES ('$nidn','$nama','$jabatan','$alamat','$no_tlp')";
		$data = $database->query($sql);
		header("location: dosen.php");
	} ?>
	<form method="post" action="">	
		<div class="container">
			<tr>
				<td>NIDN :</td>
				<td><input class="form-control" type="text" name="nidn"></td>
			</tr>
			<tr>
				<td>NAMA :</td>
				<td><input class="form-control" type="text" name="nama"></td>
			</tr>
			<tr>
				<td>JABATAN :</td>
				<td><input class="form-control" type="text" name="jabatan"></td>
			</tr>
			
			<tr>
				<td>ALAMAT :</td>
				<td><input class="form-control" type="text" name="alamat"></td>
			</tr>
			<tr>
				<td>NO_TLP :</td>
				<td><input class="form-control" type="text" name="no_tlp"></td>
			</tr>

			<tr colspan="2" align="center">
				<td><input class="btn btn-primary" type="submit" name="simpan" value="SIMPAN"></td>
				<td><input class="btn btn-success" type="reset" name="cancel" value="BATALKAN"></td>
			</tr>	
			
		</div>
	</form>
	<table border="1" cellspacing="0" class="table">
	</tr>
	<tr>
		<td>NIDN</td>
		<td>NAMA</td>
		<td>JABATAN</td>
		<td>ALAMAT</td>
		<td>NO_TLP</td>
		<td>OPSI</td>
	</tr>
	<?php				

	$sql= "SELECT * FROM dosen";
	$data = $database->query($sql);
	?>




	<?php if ($data->num_rows > 0) {
		// jika data benar
		while($row = $data->fetch_assoc()){ ?>
			<tr>
				<td><?php echo $row['nidn']; ?></td>
				<td><?php echo $row['nama']; ?></td>
				<td><?php echo $row['homebase']; ?></td>
				<td><?php echo $row['alamat']; ?></td>
				<td><?php echo $row['no_telp']; ?></td>
				
				<td><a class="btn btn-danger"href="delete_dosen.php?nidn=<?php echo"$row[nidn]";?>">DELETE</a></td>


			</tr>
			
		<?php 	}?>
	</table>
<?php } else {
		// jika data salah
	echo "data kosong";
} ?>
</body>
</html>
