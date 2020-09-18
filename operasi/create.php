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
		if (mysqli_query($connect, $query)) {
			echo "<div class=\"alert alert-success\" role=\"alert\">Berhasil disimpan</div>";
		}else{
			echo "<div class=\"alert alert-danger\" role=\"alert\">Gagal disimpan</div>";
		}
	}
}
 ?>

<a href="<?= $WEB_CONFIG['base_url'] ?>" class="btn btn-warning mb-3">
	<svg style="width:20px;height:20px" viewBox="0 0 24 24" class="mb-1">
    	<path fill="#000000" d="M2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12M18,11H10L13.5,7.5L12.08,6.08L6.16,12L12.08,17.92L13.5,16.5L10,13H18V11Z" />
	</svg> Back To Data
</a>

<div class="container">
	<form action="" method="post">
		<div class="form-group">
			<label for="inputNama">Nama Mahasiswa</label>
			<select name="id_mahasiswa" class="form-control" id="inputNama">
			<?php
			$query = "SELECT `mahasiswa`.`nama`, `mahasiswa`.`id` FROM `nilai`,`matakuliah` INNER JOIN `mahasiswa` ON `matakuliah`.`id_mahasiswa` = `mahasiswa`.`id` GROUP BY
					`mahasiswa`.`nama`,`mahasiswa`.`id`";
			$result = mysqli_query($connect, $query);
			 while($data = mysqli_fetch_array($result))
			 {
			?>
			<option value="<?php echo $data['id']?>"><?php echo $data['nama']?></option>
			 <?php }
			 ?></select>
			<small class="text-danger"><?= $namaErr == "" ? "":"* $namaErr " ?></small>
		</div>
		<div class="form-group">
			<label for="inputMatkul">Mata kuliah</label>
			<select name="id_matkul" class="form-control" id="inputMatkul">
			<?php
			$query = "SELECT `matakuliah`.`nama_matkul`,`matakuliah`.`id` FROM `nilai`,`matakuliah` INNER JOIN `mahasiswa` ON `matakuliah`.`id_mahasiswa` = `mahasiswa`.`id` GROUP BY
					  `matakuliah`.`nama_matkul`,`matakuliah`.`id`";
			$result = mysqli_query($connect, $query);
			 while($data = mysqli_fetch_array($result))
			 {
			?>
			<option value="<?php echo $data['id']?>"><?php echo $data['nama_matkul']?></option>
			 <?php }
			 ?></select>
			<small class="text-danger"><?= $matkulErr == "" ? "":"* $matkulErr" ?></small>
		</div>
		<div class="form-group">
			<label for="inputPassword">Nilai</label>
			<input type="text" name="nilai" class="form-control" id="inputPassword" maxlength="4"  required>
			<small class="text-danger"><?= $nilaiErr == "" ? "":"* $nilaiErr" ?></small>
		</div>
		<div class="form-group">
			<label for="inputEmail">Keterangan</label>
			<input type="text" name="keterangan" class="form-control" id="inputEmail" maxlength="50" required>
			<small class="text-danger"><?= $ketErr == "" ? "":"* $ketErr" ?></small>
		</div>
		<input type="submit" class="btn btn-dark m-1" name="save" value="Save Now!">
	</form>
</div>
