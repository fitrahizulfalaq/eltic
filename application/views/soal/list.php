<!-- App Header -->
<div class="appHeader bg-primary text-light">
	<div class="left">
		<a href="<?=base_url("subtema/detail/".$id)?>" class="headerButton goBack">
			<ion-icon name="chevron-back-outline" role="img" class="md hydrated" aria-label="chevron back outline"></ion-icon>
		</a>
	</div>
	<div class="pageTitle">Tambah Soal <?= $this->fungsi->pilihan_selected("tb_subtema",$id)->row("deskripsi")?></div>
	<?php if ($this->session->tipe_user >= 2) { ?>
		<div class="right">
			<a href="<?= base_url("soal/tambah/".$id)?>" class="headerButton">
				<ion-icon name="add-outline" role="img" class="md hydrated" aria-label="add outline"></ion-icon>
			</a>
		</div>
	<?php } ?>
</div>
<!-- * App Header -->

<div id="appCapsule">
	<div class="section mt-2">
		<div class="section-title">Data Soal untuk Sub Tema : <br><?= $this->fungsi->pilihan_selected("tb_subtema",$id)->row("deskripsi")?></div>
		<div class="card">
			<?php $this->view('message') ?>
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col" width="80%">Pertanyaan</th>
							<th scope="col" class="text-end" width="20%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($tanya->result() as $key => $data) {; ?>
							<tr>
								<td><?= $data->soal ?></td>
								<td class="text-end text-primary">
									<?php if($this->session->tipe_user >= 2) {?>
									<a href="<?= base_url("soal/hapus/" . $data->id."/subtema/".$this->uri->segment(3)) ?>"> Hapus</a>
									<?php } ?>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>

		</div>
	</div>
</div>
