<div id="appCapsule">

	<div class="section mt-2">
	<?php $this->view('message'); ?>
		<div class="card">
			<div class="card-body">
				<div class="p-1">
					<div class="text-center">
						<h2 class="text-primary">Lupa Password</h2>
						<p>Masukkan Nomor HP untuk Mengirimkan Identitas</p>
					</div>
					<?= form_open_multipart('') ?>
                    <div class="form-group basic animated">
						<div class="input-wrapper">
							<label class="label" for="hp">No HP</label>
							<input type="text" name="hp" class="form-control" id="hp" placeholder="081231390340" value="<?= set_value('hp');?>" required>
							<i class="clear-input">
								<ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
							</i>
						</div>
						<?php echo form_error('hp')?>
					</div>

					<div class="mt-2">
						<button type="submit" class="btn btn-primary btn-lg btn-block">Kirim Identitas Akun</button>
					</div>

					</form>
					<?= form_close() ?>
				</div>
			</div>
		</div>
	</div>	


</div>
