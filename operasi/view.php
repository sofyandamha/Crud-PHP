<?php 
$query = "SELECT `mahasiswa`.`id`, `matakuliah`.`id` AS `id1`, `mahasiswa`.`nama`, `matakuliah`.`nama_matkul`, `nilai`.`nilai` FROM `mahasiswa`
  INNER JOIN `matakuliah` ON `matakuliah`.`id_mahasiswa` = `mahasiswa`.`id`
  INNER JOIN `nilai` ON `matakuliah`.`id` = `nilai`.`id_matkul`";
$result = mysqli_query($connect, $query);
 ?>

<a href="<?= $WEB_CONFIG['base_url'] ?>" class="btn btn-warning mb-3">
	<svg style="width:20px;height:20px" viewBox="0 0 24 24" class="mb-1">
    	<path fill="#000000" d="M2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12M18,11H10L13.5,7.5L12.08,6.08L6.16,12L12.08,17.92L13.5,16.5L10,13H18V11Z" />
	</svg> Back To Data
</a>
<div class="box_table">
	<table class="table table-sm">
		<thead>
			<tr>
				<th>#</th>
				<th>ID Mahasiswa</th>
				<th>Nama Mahasiswa</th>
				<th>ID Mata Kuliah</th>
				<th>Nama Mata Kuliah</th>
				<th>Nilai </th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1; ?>
			<?php while($data = mysqli_fetch_array($result)) : ?>
			<tr>
				<td><?= $no ?></td>
				<td><?= $data['id'] ?></td>
				<td><?= $data['nama'] ?></td>
				<td><?= $data['id1'] ?></td>
				<td><?= $data['nama_matkul'] ?></td>
				<td><?= $data['nilai'] ?></td>
			</tr>
			<?php $no++ ?>
			<?php endwhile; ?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
function alertDelete(idn) {
	$('#deleteButtonModal').attr('href', '<?= $WEB_CONFIG['base_url'] ?>index.php?page=delete&id='+idn);
	$('#deleteModal').modal('show');
}
</script>