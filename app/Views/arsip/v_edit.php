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
				<?=
					form_open_multipart('arsip/update/' . $arsip['id_arsip']);
				helper('text');
				$no_arsip = date('Ymd') . random_string('alnum', 4);
				?>
				<div class="form-group">
					<label for="nama_user">No Arsip</label>
					<input type="text" class="form-control" value="<?= $arsip['no_arsip'] ?>" id="no_arsip" readonly="" name="no_arsip" placeholder="Masukkan No. Arsip">
				</div>
				<div class="form-group">
					<select name="id_kategori" id="" class="form-control">
						<option value="<?= $arsip['id_kategori'] ?>"><?= $arsip['nama_kategori'] ?></option>
						<?php foreach ($kategori as $key => $value) : ?>
							<option value="<?= $value['id_kategori'] ?>"><?= $value['nama_kategori'] ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group">
					<label for="email">Nama File</label>
					<input type="text" class="form-control" value="<?= $arsip['nama_file'] ?>" id="nama_file" name="nama_file" placeholder="Masukkan Nama Arsip">
				</div>
				<div class="form-group">
					<label for="password">Deskripsi</label>
					<textarea name="deskripsi" id="" rows="5" class="form-control"><?= $arsip['deskripsi'] ?></textarea>
				</div>
				<div class="form-group">
					<label for="email">File Arsip</label>
					<input type="file" class="form-control" id="file_arsip" name="file_arsip" placeholder="Masukkan Nama Arsip">
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