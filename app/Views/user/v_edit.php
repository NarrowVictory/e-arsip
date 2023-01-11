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
				<?= form_open_multipart('user/update/'.$user['id_user']) ?>				
				<div class="form-group">
					<label for="nama_user">Nama User</label>
					<input type="text" value="<?= $user['nama_user'] ?>" class="form-control" id="nama_user" name="nama_user" placeholder="Masukkan Nama User">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" value="<?= $user['email'] ?>" class="form-control" id="email" name="email" placeholder="Masukkan Email">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="text" class="form-control" value="<?= $user['password'] ?>" id="password" name="password" placeholder="Masukkan Password">
				</div>
				<div class="form-group">
					<label for="level">Level</label>
					<select name="level" id="" class="form-control">
						<option value="">--Pilih--Level</option>
						<option value="1" <?= $user['level'] == 1 ? "selected" : null ?>>Admin</option>
						<option value="2" <?= $user['level'] == 2 ? "selected" : null ?>>User</option>
					</select>
				</div>
				<div class="form-group">
					<label for="dep">Departemen</label>
					<select name="id_department" id="id_department" class="form-control">
						<option value="<?= $user['id_department'] ?>"><?= $user['nama_dep'] ?></option>
						<?php foreach ($dep as $key => $value): ?>
						<option value="<?= $value['id_dep'] ?>"><?= $value['nama_dep'] ?></option>
						<?php endforeach ?>
					</select>
				</div>

				<div class="row">
				<div class="col-sm-4">
					<img src="<?= base_url('template/foto/'.$user['foto']) ?>" width="80px">	
				</div>

				<div class="col-sm-8">
					<div class="form-group">
						<label for="foto">Foto</label>
						<input type="file" class="form-control" id="foto" name="foto">
					</div>
				</div>
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