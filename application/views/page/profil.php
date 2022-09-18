<!-- App Capsule -->
<div id="appCapsule">

	<div class="section mt-3 text-center">
		<div class="avatar-section">
			<a href="#">
				<!-- <img src="<?= base_url() ?>/assets/img/default/1x1.png" alt="avatar" class="imaged w100 rounded"> -->
				<ion-icon name="person-circle-outline" class="iconedbox iconedbox-xl"></ion-icon>
			</a>
		</div>
	</div>
	<div class="section mt-3 text-center">
		<h2><?= $this->session->nama ?></h2>
		<h3><?= $this->session->email?></h3>
		<h3><?= $this->session->poin ?></h3>
	</div>
	
	<br>

	<ul class="listview image-listview text inset">
		<li>
			<a href="<?= base_url("page/pembuat") ?>" class="item">
			<div class="icon-box bg-primary">
					<ion-icon name="person-outline"></ion-icon>
				</div>
				<div class="in">
					<div>Tentang Pengembang</div>
				</div>
			</a>
		</li>
		<li>
			<a href="<?= base_url("auth/logout") ?>" class="item">
				<div class="icon-box bg-primary">
					<ion-icon name="log-out-outline"></ion-icon>
				</div>
				<div class="in">
					Log out
				</div>
			</a>
		</li>
	</ul>



</div>
<!-- * App Capsule -->