<div class="row">
	<div class="col-sm-12">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th width="120px">No Arsip</th>
					<td width="20px">:</td>
					<td><?= $arsip['no_arsip'] ?></td>
					<th width="120px">Tanggal Upload</th>
					<td width="20px">:</td>
					<td><?= $arsip['tanggal_upload'] ?></td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th width="120px">Nama Arsip</th>
					<td width="20px">:</td>
					<td><?= $arsip['nama_file'] ?></td>
					<th width="120px">Tanggal Update</th>
					<td width="20px">:</td>
					<td><?= $arsip['tanggal_update'] ?></td>
				</tr>
				<tr>
					<th width="120px">Nama Kategori</th>
					<td width="20px">:</td>
					<td><?= $arsip['nama_kategori'] ?></td>
					<th width="120px">Ukuran File</th>
					<td width="20px">:</td>
					<td><?= $arsip['ukuran_file'] ?> Byte</td>
				</tr>
				<tr>
					<th width="120px">User</th>
					<td width="20px">:</td>
					<td><?= $arsip['nama_user'] ?></td>
					<th width="120px">Department</th>
					<td width="20px">:</td>
					<td><?= $arsip['nama_dep'] ?> Byte</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<iframe src="<?= base_url('template/file_arsip/'.$arsip['file_arsip']) ?>" width="100%" height="1000px" frameborder="0"></iframe>