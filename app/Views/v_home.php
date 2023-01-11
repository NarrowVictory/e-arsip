<div class="row">
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-green">
			<div class="inner">
				<h3><?= $total_arsip ?></h3>
				<p>Arsip</p>
			</div>
			<div class="icon">
				<i class="fa fa-archive"></i>
			</div>
			<a href="<?= base_url('arsip') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>

	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-aqua">
			<div class="inner">
				<h3><?= $total_kategori ?></h3>
				<p>Kategori</p>
			</div>
			<div class="icon">
				<i class="fa fa-bookmark-o"></i>
			</div>
			<a href="<?= base_url('kategori') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>

	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-yellow">
			<div class="inner">
				<h3><?= $total_department ?></h3>
				<p>Department</p>
			</div>
			<div class="icon">
				<i class="fa fa-building-o"></i>
			</div>
			<a href="<?= base_url('dep') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>

	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-red">
			<div class="inner">
				<h3><?= $total_user ?></h3>
				<p>User</p>
			</div>
			<div class="icon">
				<i class="fa fa-user"></i>
			</div>
			<a href="<?= base_url('user') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
</div>