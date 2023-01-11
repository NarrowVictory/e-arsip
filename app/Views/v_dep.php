<div class="row">
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">Data Department</h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#add"><i class="fa fa-plus"> Add</i>
					</button>
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
							<th>dep</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1;
						foreach ($dep as $value) { ?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?= $value['nama_dep'] ?></td>
							<td class="text-center">
								<button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#edit<?= $value['id_dep'] ?>">Edit</button>
								<button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete<?= $value['id_dep'] ?>">Delete</a>
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

<!-- Modal Add -->
<div class="modal fade" id="add">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Default Modal</h4>
			</div>
			<div class="modal-body">
				<?= form_open('dep/add') ?>
				<div class="form-group">
					<label for="nama_dep">Nama dep</label>
					<input type="text" class="form-control" id="nama_dep" name="nama_dep" placeholder="Masukkan Nama dep">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			</div>
			<?= form_close() ?>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- END MODAL ADD -->

<!-- Modal Edit -->
<?php foreach ($dep as $value) { ?>
<div class="modal fade" id="edit<?= $value['id_dep'] ?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Default Modal</h4>
			</div>
			<div class="modal-body">
				<?= form_open('dep/edit/'. $value['id_dep']) ?>
				<div class="form-group">
					<label for="nama_dep">Nama dep</label>
					<input type="text" value="<?= $value['nama_dep'] ?>" class="form-control" id="nama_dep" name="nama_dep" placeholder="Masukkan Nama dep">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Updates</button>
			</div>
			<?= form_close() ?>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<?php } ?>
<!-- End Modal Edit -->

<!-- Modal Delete -->
<?php foreach ($dep as $value) { ?>
<div class="modal fade" id="delete<?= $value['id_dep'] ?>">
	<div class="modal-dialog modal-danger">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Hapus Data</h4>
			</div>
			<div class="modal-body">
				Apakah anda yakin akan menghapus data <?= $value['nama_dep'] ?>?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-warning" data-dismiss="modal">Tidak</button>
				<a href="<?= base_url('dep/delete/'. $value['id_dep']) ?>" type="submit" class="btn btn-success">Ya</a>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<?php } ?>
<!-- End -->