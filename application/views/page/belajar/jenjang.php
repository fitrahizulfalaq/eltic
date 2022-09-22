<!-- App Header -->
<div class="appHeader bg-primary text-light">
	<div class="left">
		<a href="<?=base_url("")?>" class="headerButton goBack">
			<ion-icon name="chevron-back-outline" role="img" class="md hydrated" aria-label="chevron back outline"></ion-icon>
		</a>
	</div>
    <div class="pageTitle">Pulih Jenjang</div>	
</div>
<!-- * App Header -->

<div id="appCapsule">
    <div class="section mt-2">
        <div>
            <h1>Pilih Jenjang</h1>
        </div>
        <div class="card">
            <ul class="listview flush transparent image-listview text">
                <li>
                    <a href="<?=base_url("page/jenjang/sd")?>" class="item">
                        <div class="in">
                            <div>SD</div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?=base_url("page/jenjang/smp")?>" class="item">
                        <div class="in">
                            <div>SMP</div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?=base_url("page/jenjang/sma")?>" class="item">
                        <div class="in">
                            <div>SMA</div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>