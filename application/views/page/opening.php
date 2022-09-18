<!-- App Header -->
<div class="appHeader no-border transparent position-absolute">
	<div class="pageTitle">ELTIC APPS</div>
</div>
<!-- * App Header -->

<!-- App Capsule -->
<div id="appCapsule">

	<div class="error-page">
        <ion-icon name="person-circle-outline" class="iconedbox iconedbox-xl"></ion-icon>
		<h1>Selamat Datang,</h1>
		<h2><?= $this->session->nama ?></h2>
        <h4>Poin Anda : <?= $this->fungsi->getSaldo($this->session->id) ?></h4>        
		<div class="text mb-5">
			Selamat datang di Aplikasi ELTIC. <br> Anda bisa mempelajari banyak hal melalui beragam media.
		</div>

		<div class="fixed-footer">
			<div class="row">
				<div class="col-6">
					<a href="<?=base_url()?>" class="btn btn-primary btn-lg btn-block"><ion-icon name="home-outline"></ion-icon> Beranda</a>
				</div>
				<div class="col-6">
					<a href="<?=base_url("topup")?>" class="btn btn-success btn-lg btn-block"><ion-icon name="cash-outline"></ion-icon> Beli Koin</a>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- * App Capsule -->