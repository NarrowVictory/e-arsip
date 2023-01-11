<div class="row">
	<div class="col-md-3">
	</div>
	<div class="col-md-6">
		<div class="box box-primary box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?= $title ?></h3>
				<!-- /.box-tools -->
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<?php
				$error = session()->getFlashdata('pesan');
				if (!empty($error)) { ?>
				<div class="alert alert-danger alert-dismissible">
					<?php foreach ($error as $value) {
					echo esc($value);
					echo "<br>";
					} ?>
				</div>
				<?php }    ?>
				<?= form_open_multipart('user/insert') ?>
				<div class="form-group">
					<label for="nama_user">Nama User</label>
					<input type="text" class="form-control" id="nama_user" name="nama_user" placeholder="Masukkan Nama User">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="text" class="form-control" id="password" name="password" placeholder="Masukkan Password">
				</div>
				<div class="form-group">
					<label for="level">Level</label>
					<select name="level" id="" class="form-control">
						<option value="">--Pilih--Level</option>
						<option value="1">Admin</option>
						<option value="2">User</option>
					</select>
				</div>
				<div class="form-group">
					<label for="dep">Departemen</label>
					<select name="id_department" id="id_department" class="form-control">
						<option value="">--Pilih Departemen--</option>
						<?php foreach ($dep as $key => $value): ?>
						<option value="<?= $value['id_dep'] ?>"><?= $value['nama_dep'] ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group">
					<label for="foto">Foto</label>
					<input type="file" class="form-control" id="foto" name="foto">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-success pull-right">Simpan</button>
					<a style="margin-right: 7px" class="btn btn-default pull-right" href="<?= base_url('user') ?>">Kembali</a>
				</div>
				<?= form_close() ?>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>
	<div class="col-md-3">
	</div>
</div>