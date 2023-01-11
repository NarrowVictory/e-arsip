<div class="row">
	<div class="col-md-12">
		<div class="box box-primary box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">Data user</h3>
				<div class="box-tools pull-right">
					<a href="<?= base_url('user/add') ?>" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"> Add</i>
					</a>
				</div>
				<!-- /.box-tools -->
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<?php if (session()->getFlashdata('pesan2')) {
				echo "<div class=\"alert alert-success alert-dismissible\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                <h4><i class=\"icon fa fa-check\"></i> Success </h4>";
					echo session()->getFlashdata('pesan2');
				echo "</div>";
				} ?>

				<?php if (session()->getFlashdata('pesan3')) {
				echo "<div class=\"alert alert-danger alert-dismissible\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                <h4><i class=\"icon fa fa-check\"></i> Success </h4>";
					echo session()->getFlashdata('pesan3');
				echo "</div>";
				} ?>

				<table class="table table-responsive table-bordered" id="example1">
					<thead>
						<tr>
							<th width="80px">No</th>
							<th>Nama User</th>
							<th>Email</th>
							<th>Password</th>
							<th>Level</th>
							<th>Foto</th>
							<th>Department</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1;
						foreach ($user as $value) { ?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?= $value['nama_user'] ?></td>
							<td><?= $value['email'] ?></td>
							<td><?= $value['password'] ?></td>
							<td><?php
							if ($value['level']==1) {
								echo "Admin";
							}else{
								echo "User"; }
							 ?></td>
							<td><img src="<?= base_url('template/foto/'.$value['foto']) ?>" width="80px"></td>
							<td><?= $value['nama_dep'] ?></td>
							<td class="text-center">
								<a href="<?= base_url('user/edit/'.$value['id_user']) ?>" class="btn btn-warning btn-xs">Edit</a>
								<button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete<?= $value['id_user'] ?>">Delete</a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>
</div>

<!-- Modal Delete -->
<?php foreach ($user as $value) { ?>
<div class="modal fade" id="delete<?= $value['id_user'] ?>">
	<div class="modal-dialog modal-danger">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Hapus Data</h4>
			</div>
			<div class="modal-body">
				Apakah anda yakin akan menghapus data <?= $value['nama_user'] ?>?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-warning" data-dismiss="modal">Tidak</button>
				<a href="<?= base_url('user/delete/'. $value['id_user']) ?>" type="submit" class="btn btn-success">Ya</a>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<?php } ?>
<!-- End -->