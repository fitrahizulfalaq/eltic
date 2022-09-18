<div class="appHeader bg-info text-light">
	<div class="left">
		<a href="<?= base_url("subtema/list/" . $tema) ?>" class="headerButton goBack">
			<ion-icon name="chevron-back-outline" role="img" class="md hydrated" aria-label="chevron back outline"></ion-icon>
		</a>
	</div>
	<div class="pageTitle"><?= $menu ?></div>
	<?php if ($this->session->tipe_user >= 2) { ?>
		<div class="right">
			<a href="<?= base_url("subtema/tambah/" . $tema) ?>" class="headerButton">
				<ion-icon name="add-outline" role="img" class="md hydrated" aria-label="add outline"></ion-icon>
			</a>
		</div>
	<?php } ?>
</div>
<!-- * App Header -->

<!-- App Capsule -->
<div id="appCapsule">
	<div class="section mt-2">
		<div class="in">
			<h2><?= $menu ?></h2>
			<h1 class="total">Materi <?= $data->deskripsi ?></h1>
			<h3>Kelas : <?= $kelas ?></h3>
		</div>
	</div>

	<div class="section full mt-3">
		<?php $this->view('message') ?>
		<div class="wide-block pt-2 pb-2">
			<h2>RPP dan Modul</h2>
			<!-- <p>Basic modal example</p> -->
			<?php if ($pembelian_rpp != null) { ?>

				<div class="accordion" id="accordionExample2">
					<div class="item">
						<div class="accordion-header">
							<button class="btn collapsed" type="button" data-toggle="collapse" data-target="#accordion01" aria-expanded="false">
								RPP
							</button>
						</div>
						<div id="accordion01" class="accordion-body collapse" data-parent="#accordionExample2" style="">
							<div class="accordion-content">
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalRPP">
									<ion-icon name="book-outline"></ion-icon> Lihat RPP
								</button>
							</div>
						</div>
					</div>

					<div class="item">
						<div class="accordion-header">
							<button class="btn collapsed" type="button" data-toggle="collapse" data-target="#accordion02">
								Modul
							</button>
						</div>
						<div id="accordion02" class="accordion-body collapse" data-parent="#accordionExample2">
							<div class="accordion-content">
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalMateri">
									<ion-icon name="book-outline"></ion-icon> Materi
								</button>
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalContohSoal">
									<ion-icon name="book-outline"></ion-icon> Contoh Soal
								</button>
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalkuis">
									<ion-icon name="book-outline"></ion-icon> Kuis
								</button>
							</div>
						</div>
					</div>
				<?php } else { ?>
					<a class="btn btn-warning" data-toggle="modal" data-target="#beliRPP">
						<ion-icon name="lock-closed-outline"></ion-icon> Beli
					</a>
				<?php } ?>
				</div>
		</div>

		<div class="section full mt-3">
			<div class="wide-block pt-2 pb-2">
				<h2>Perangkat Pembelajaran</h2>
				<!-- <p>Basic modal example</p> -->

				<?php if ($pembelian_perangkat != null) { ?>
					<div class="accordion" id="accordionExample2">
						<div class="item">
							<div class="accordion-header">
								<button class="btn collapsed" type="button" data-toggle="collapse" data-target="#accordion03" aria-expanded="false">
									Video
								</button>
							</div>
							<div id="accordion03" class="accordion-body collapse" data-parent="#accordionExample2" style="">
								<div class="accordion-content">
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalvideo">
										<ion-icon name="book-outline"></ion-icon> Lihat Video
									</button>
								</div>
							</div>
						</div>

						<div class="item">
							<div class="accordion-header">
								<button class="btn collapsed" type="button" data-toggle="collapse" data-target="#accordion04" aria-expanded="false">
									PPT
								</button>
							</div>
							<div id="accordion04" class="accordion-body collapse" data-parent="#accordionExample2" style="">
								<div class="accordion-content">
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalppt">
										<ion-icon name="book-outline"></ion-icon> Lihat PPT
									</button>
								</div>
							</div>
						</div>

						<div class="item">
							<div class="accordion-header">
								<button class="btn collapsed" type="button" data-toggle="collapse" data-target="#accordion05" aria-expanded="false">
									Animasi
								</button>
							</div>
							<div id="accordion05" class="accordion-body collapse" data-parent="#accordionExample2" style="">
								<div class="accordion-content">
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalanimasi">
										<ion-icon name="book-outline"></ion-icon> Lihat Animasi
									</button>
								</div>
							</div>
						</div>
					<?php } else { ?>
						<a class="btn btn-warning" data-toggle="modal" data-target="#beliPerangkat">
							<ion-icon name="lock-closed-outline"></ion-icon> Beli
						</a>
					<?php } ?>
					</div>
			</div>

			<!-- Modal RPP -->
			<div class="modal fade modalbox" id="modalRPP" data-backdrop="static" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">RPP</h5>
							<div>
								<a href="<?= base_url("subtema/tambahkonten/" . $data->id . "?tipe=rpp") ?>"><?= $data->rpp != "" && $this->session->tipe_user >= "2" ? "Edit" : ""; ?></a>
								<a href="javascript:;" data-dismiss="modal">Close</a>
							</div>
						</div>
						<div class="modal-body">
							<?php if ($data->rpp == null) { ?>
								<div class="alert alert-danger mb-1" role="alert">
									Tidak ada data
								</div>
								<?php if ($this->session->tipe_user >= 2) { ?>
									<div>
										<br><a href="<?= base_url("subtema/tambahkonten/" . $data->id . "?tipe=rpp") ?>" class="btn btn-outline-success me-1 mb-1">Tambah Data</a>
									</div>
								<?php } ?>
							<?php } else { ?>
								<iframe src="https://drive.google.com/file/d/<?= $data->rpp ?>/preview" frameborder="0" width="100%" height="700px"></iframe>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<!-- * Modal RPP -->

			<!-- Modal Materi -->
			<div class="modal fade modalbox" id="modalMateri" data-backdrop="static" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Materi</h5>
							<div>
								<a href="<?= base_url("subtema/tambahkonten/" . $data->id . "?tipe=materi") ?>"><?= $data->materi != "" && $this->session->tipe_user >= "2" ? "Edit" : ""; ?></a>
								<a href="javascript:;" data-dismiss="modal">Close</a>
							</div>
						</div>
						<div class="modal-body">
							<?php if ($data->materi == null) { ?>
								<div class="alert alert-danger mb-1" role="alert">
									Tidak ada data
								</div>
								<?php if ($this->session->tipe_user >= 2) { ?>
									<div>
										<br><a href="<?= base_url("subtema/tambahkonten/" . $data->id . "?tipe=materi") ?>" class="btn btn-outline-success me-1 mb-1">Tambah Data</a>
									</div>
								<?php } ?>
							<?php } else { ?>
								<iframe src="https://drive.google.com/file/d/<?= $data->materi ?>/preview" frameborder="0" width="100%" height="700px"></iframe>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<!-- * Modal Materi -->

			<!-- Modal ContohSoal -->
			<div class="modal fade modalbox" id="modalContohSoal" data-backdrop="static" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Contoh Soal</h5>
							<div>
								<a href="<?= base_url("subtema/tambahkonten/" . $data->id . "?tipe=contohsoal") ?>"><?= $data->contohsoal != "" && $this->session->tipe_user >= "2" ? "Edit" : ""; ?></a>
								<a href="javascript:;" data-dismiss="modal">Close</a>
							</div>
						</div>
						<div class="modal-body">
							<?php if ($data->contohsoal == null) { ?>
								<div class="alert alert-danger mb-1" role="alert">
									Tidak ada data
								</div>
								<?php if ($this->session->tipe_user >= 2) { ?>
									<div>
										<br><a href="<?= base_url("subtema/tambahkonten/" . $data->id . "?tipe=contohsoal") ?>" class="btn btn-outline-success me-1 mb-1">Tambah Data</a>
									</div>
								<?php } ?>
							<?php } else { ?>
								<iframe src="https://drive.google.com/file/d/<?= $data->contohsoal ?>/preview" frameborder="0" width="100%" height="700px"></iframe>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<!-- * Modal ContohSoal -->

			<!-- Modal kuis -->
			<div class="modal fade modalbox" id="modalkuis" data-backdrop="static" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Contoh Soal</h5>
							<div>
								<a href="javascript:;" data-dismiss="modal">Close</a>
							</div>
						</div>
						<div class="modal-body">
							<?php if ($this->session->tipe_user == "1") { ?>
								<h5><strong>PETUNJUK PENGERJAAN:</strong></h5>
								<ol start="1" type="1">
									<li>Berdoalah sebelum mengerjakan soal.</li>
									<li>Teliti soal terlebih dahulu.</li>
									<li>Untuk soal pilihan ganda, klik pada pilihan a, b, c, dan d pada jawaban yang Anda anggap benar.</li>
									<li>Setelah semua pertanyaan selesai dijawab, nilai skor soal Pilihan Ganda secara otomatis akan langsung keluar </li>
								</ol>
								<?php if ($this->fungsi->pilihan_advanced("tb_soal", "subtema_id", $data->id)->num_rows() != null) { ?>
									<a href="<?= base_url("quiz/startQUiz/" . $data->id) ?>" class="btn btn-outline-info me-1 mb-1">KERJAKAN KUIS</a>
								<?php } else { ?>
									<div class="alert alert-danger mb-1" role="alert">
										Mohon Maaf, Saat Ini Tidak ada soal
									</div>
								<?php } ?>
							<?php } else if ($this->session->tipe_user == "2") { ?>
								<h5><strong>PETUNJUK PENAMBAHAN SOAL:</strong></h5>
								<ol start="1" type="1">
									<li>Soal terdiri dari pilihan ganda.</li>
									<li>Masukkan data soal anda.</li>
									<li>Klik simpan.</li>
								</ol>
								<a href="<?= base_url("soal/data/" . $data->id) ?>" class="btn btn-outline-info me-1 mb-1">TAMBAH SOAL</a>
							<?php } else { ?>
								<h5><strong>ANDA ADALAH ADMIN</strong></h5>
								<a href="<?= base_url("soal/data/" . $data->id) ?>" class="btn btn-outline-info me-1 mb-1">LIHAT SOAL</a>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<!-- * Modal kuis -->

			<!-- Modal video -->
			<div class="modal fade modalbox" id="modalvideo" data-backdrop="static" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Video</h5>
							<div>
								<a href="<?= base_url("subtema/tambahkonten/" . $data->id . "?tipe=video") ?>"><?= $data->video != "" && $this->session->tipe_user >= "2" ? "Edit" : ""; ?></a>
								<a href="javascript:;" data-dismiss="modal">Close</a>
							</div>
						</div>
						<div class="modal-body">
							<?php if ($data->video == null) { ?>
								<div class="alert alert-danger mb-1" role="alert">
									Tidak ada data
								</div>
								<?php if ($this->session->tipe_user >= 2) { ?>
									<div>
										<br><a href="<?= base_url("subtema/tambahkonten/" . $data->id . "?tipe=video") ?>" class="btn btn-outline-success me-1 mb-1">Tambah Data</a>
									</div>
								<?php } ?>
							<?php } else { ?>
								<iframe class="rounded" width="100%" height="600px" src="https://www.youtube.com/embed/<?= $data->video ?>?rel=0&modestbranding=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<!-- * Modal video -->

			<!-- Modal ppt -->
			<div class="modal fade modalbox" id="modalppt" data-backdrop="static" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">PPT</h5>
							<div>
								<a href="<?= base_url("subtema/tambahkonten/" . $data->id . "?tipe=ppt") ?>"><?= $data->ppt != "" && $this->session->tipe_user >= "2" ? "Edit" : ""; ?></a>
								<a href="javascript:;" data-dismiss="modal">Close</a>
							</div>
						</div>
						<div class="modal-body">
							<?php if ($data->ppt == null) { ?>
								<div class="alert alert-danger mb-1" role="alert">
									Tidak ada data
								</div>
								<?php if ($this->session->tipe_user >= 2) { ?>
									<div>
										<br><a href="<?= base_url("subtema/tambahkonten/" . $data->id . "?tipe=ppt") ?>" class="btn btn-outline-success me-1 mb-1">Tambah Data</a>
									</div>
								<?php } ?>
							<?php } else { ?>
								<iframe src="https://drive.google.com/file/d/<?= $data->ppt ?>/preview" frameborder="0" width="100%" height="700px"></iframe>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<!-- * Modal ppt -->

			<!-- Modal animasi -->
			<div class="modal fade modalbox" id="modalanimasi" data-backdrop="static" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Animasi</h5>
							<div>
								<a href="<?= base_url("subtema/tambahkonten/" . $data->id . "?tipe=animasi") ?>"><?= $data->animasi != "" && $this->session->tipe_user >= "2" ? "Edit" : ""; ?></a>
								<a href="javascript:;" data-dismiss="modal">Close</a>
							</div>
						</div>
						<div class="modal-body">
							<?php if ($data->animasi == null) { ?>
								<div class="alert alert-danger mb-1" role="alert">
									Tidak ada data
								</div>
								<?php if ($this->session->tipe_user >= 2) { ?>
									<div>
										<br><a href="<?= base_url("subtema/tambahkonten/" . $data->id . "?tipe=animasi") ?>" class="btn btn-outline-success me-1 mb-1">Tambah Data</a>
									</div>
								<?php } ?>
							<?php } else { ?>
								<iframe class="rounded" width="100%" height="600px" src="https://www.youtube.com/embed/<?= $data->animasi ?>?rel=0&modestbranding=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<!-- * Modal animasi -->

			<!-- Dialog Basic -->
			<div class="modal fade dialogbox" id="beliRPP" data-backdrop="static" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Beli RPP</h5>
						</div>
						<div class="modal-body">
							Buka Fitur RPP
						</div>
						<div class="modal-footer">
							<div class="btn-inline">
								<a href="#" class="btn btn-text-secondary" data-dismiss="modal">Batal</a>
								<a href="<?= base_url("topup/beli?topik=" . $data->id."&produk=rpp&harga=15") ?>" class="btn btn-text-primary" onclick="this.innerHTML = 'Proses'">Bayar</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- * Dialog Basic -->

			<!-- Dialog Basic -->
			<div class="modal fade dialogbox" id="beliPerangkat" data-backdrop="static" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Beli Perangkat Pembelajaran</h5>
						</div>
						<div class="modal-body">
							Buka Fitur Perangkat Pembelajaran
						</div>
						<div class="modal-footer">
							<div class="btn-inline">
								<a href="#" class="btn btn-text-secondary" data-dismiss="modal">Batal</a>
								<a href="<?= base_url("topup/beli?topik=" . $data->id."&produk=perangkat&harga=30") ?>" class="btn btn-text-primary" onclick="this.innerHTML = 'Proses'">Bayar</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- * Dialog Basic -->

		</div>
		<!-- * App Capsule -->
	</div>
</div>