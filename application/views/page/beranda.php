<br><br>
<div class="section full mt-2">
	<div class="wide-block pt-2 pb-2">
		<h1>Selamat Datang</h1>
		<h3><?= $this->session->nama ?></h3>
        <h4>Anda login sebagai : <?= $this->fungsi->status($this->session->tipe_user) ?> | <ion-icon name="wallet-outline"></ion-icon> Poin Anda : <?= $this->fungsi->getSaldo($this->session->id) ?></h4>
	</div>
</div>
<div class="section full mt-2">
	<div class="wide-block pt-2 pb-2 border-0">
	<?php $this->view('message'); ?>
		<div class="row">
			<div class="col-6">
				<div class="card">
					<a href="<?=base_url("page/belajar/")?>">
					<div class="card-body text-center text-info">
						<ion-icon name="book-outline" class="iconedbox iconedbox-xl"></ion-icon>	
						<h3 class="text-gray">Belajar</h3>
					</div>
					</a>
				</div>
			</div>
			<div class="col-6">
				<div class="card">
					<a href="<?=base_url("info")?>">
					<div class="card-body text-center text-info">
						<ion-icon name="person-circle-outline" class="iconedbox iconedbox-xl"></ion-icon>	
						<h3 class="text-gray">Info</h3>
					</div>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="wide-block pt-2 pb-2 border-0">
		<div class="row">
			<div class="col-6">
				<div class="card">
					<a href="<?=base_url("topup")?>">
					<div class="card-body text-center text-info">
						<ion-icon name="cash-outline" class="iconedbox iconedbox-xl"></ion-icon>	
						<h3 class="text-gray">Top UP</h3>
					</div>
					</a>
				</div>
			</div>
			<div class="col-6">
				<div class="card">
					<a href="<?=base_url("page/petunjuk")?>">
					<div class="card-body text-center text-info">
						<ion-icon name="bookmark-outline" class="iconedbox iconedbox-xl"></ion-icon>	
						<h3 class="text-gray">Petunjuk</h3>
					</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>