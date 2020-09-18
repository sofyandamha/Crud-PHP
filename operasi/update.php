<?php 
$namaErr = $matkulErr = $nilaiErr = $ketErr = "";
if(isset($_POST['save'])){
	if(!isset($_POST['id_mahasiswa']) || !isset($_POST['id_matkul']) || !isset($_POST['nilai']) || !$_POST['keterangan']){
		if($_POST['id_mahasiswa'] == ""){
		$namaErr = "Nama tidak boleh kosong!";
		}
		if($_POST['id_matkul'] == ""){
			$matkulErr = "Matkul tidak boleh kosong!";
		}
		if($_POST['nilai'] == ""){
			$passwordErr = "nilai tidak boleh kosong!";
		}
		if($_POST['keterangan'] == ""){
			$emailErr = "keterangan tidak boleh kosong!";
		}
	}else{
		$id_mahasiswa = $_POST['id_mahasiswa'];
		$id_matkul = $_POST['id_matkul'];
		$nilai = $_POST['nilai'];
		$keterangan = $_POST['keterangan'];


		$query = "INSERT INTO nilai (id_mahasiswa,id_matkul,nilai,keterangan) VALUES('$id_mahasiswa', '$id_matkul', '$nilai', '$keterangan')";
		$query = "UPDATE nilai SET id_mahasiswa='$id_mahasiswa', id_matkul='$id_matkul', nilai='$nilai', keterangan='$keterangan' WHERE id=$id";
		if (mysqli_query($connect, $query)) {
			echo "<div class=\"alert alert-success\" role=\"alert\">Berhasil diubah</div>";
		}else{
			echo "<div class=\"alert alert-danger\" role=\"alert\">Gagal diubah</div>";
		}
	}
}

$id = $_GET['id'];
$query = "SELECT * FROM nilai WHERE id = $id";
$result = mysqli_query($connect, $query);
$data = mysqli_fetch_array($result);

 ?>

<a href="<?= $WEB_CONFIG['base_url'] ?>" class="btn btn-warning mb-3">
	<svg style="width:20px;height:20px" viewBox="0 0 24 24">
    	<path fill="#000000" d="M2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12M18,11H10L13.5,7.5L12.08,6.08L6.16,12L12.08,17.92L13.5,16.5L10,13H18V11Z" />
	</svg> Back To Data
</a>
<div class="container">
	<form action="" method="post">
		<div class="form-group">
			<label for="inputNama">ID Mahasiswa</label>
			<input type="text" name="nama" class="form-control" id="inputNama" value="<?= $data['id_mahasiswa'] ?>" maxlength="40" required disabled>
			<small class="text-danger"><?= $namaErr == "" ? "":"* $namaErr " ?></small>
		</div>
		<div class="form-group">
			<label for="inputUsername">ID Mata Kuliah</label>
			<input type="text" name="id_matkul" class="form-control" id="inputUsername" value="<?= $data['id_matkul'] ?>" maxlength="30" required disabled>
			<small class="text-danger"><?= $matkulErr == "" ? "":"* $matkulErr" ?></small>
		</div>
		<div class="form-group">
			<label for="inputPassword">Nilai</label>
			<input type="number" name="nilai" class="form-control" id="inputPassword" value="<?= $data['nilai'] ?>" maxlength="30" minlength="3" required>
			<small class="text-danger"><?= $nilaiErr == "" ? "":"* $nilaiErr" ?></small>
		</div>
		<div class="form-group">
			<label for="inputEmail">Keterangan</label>
			<input type="text" name="keterangan" class="form-control" id="inputEmail" value="<?= $data['keterangan'] ?>" maxlength="50" required>
			<small class="text-danger"><?= $ketErr == "" ? "":"* $ketErr" ?></small>
		</div>
		<input type="submit" class="btn btn-dark m-1" name="save" value="Update Now!">
	</form>
</div>
