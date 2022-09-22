<!-- App Header -->
<div class="appHeader bg-primary text-light">
	<div class="left">
		<a href="<?= base_url("page/jenjang/".$jenjang) ?>" class="headerButton goBack">
			<ion-icon name="chevron-back-outline" role="img" class="md hydrated" aria-label="chevron back outline"></ion-icon>
		</a>
	</div>
	<div class="pageTitle"><?= $menu ?></div>
	<?php if ($this->session->tipe_user >= 2) { ?>
		<div class="right">
			<a href="<?= base_url("tema/tambah/" . $kelas) ?>" class="headerButton">
				<ion-icon name="add-outline" role="img" class="md hydrated" aria-label="add outline"></ion-icon>
			</a>
		</div>
	<?php } ?>
</div>
<!-- * App Header -->

<div id="appCapsule">
	<div class="section mt-2">
		<div>
			<h3>List Mata Pelajaran:</h3>
			<h1>Kelas <?= $kelas ?></h1>
		</div>
		<?php $this->view('message') ?>
		
		<?php foreach ($row->result() as $key => $data) {; ?>
		<div class="section mt-2">
            <div class="card">
				<a href="<?= base_url("subtema/list/" . $data->id."?kelas=".$kelas) ?>">
                <div class="card-body">
					<h2 class="card-text"><?= $data->deskripsi ?></h2>
                </div>
				</a>
				<?php if ($this->session->tipe_user >= 2) { ?>
                <div class="card-footer">
					<a href="<?= base_url("tema/hapus/" . $data->id."/kelas/".$this->uri->segment(3)) ?>" onclick="return confirm('Yakin mau dihapus ?')" class="btn btn-danger btn-sm"><ion-icon name="trash-outline"></ion-icon>Hapus</a>
                </div>
				<?php } ?>
            </div>
        </div>
		<?php } ?>
		
		<?php if ($row->num_rows() == null) { ?>
			<div class="alert alert-danger mb-1" role="alert">
				Tidak ada data
			</div>
		<?php } ?>		
	</div>
</div>