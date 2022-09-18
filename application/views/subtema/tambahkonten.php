<div id="appCapsule">

	<div class="section mt-2">
		<div class="card">
			<div class="card-body">
				<div class="p-1">
					<div class="text-center">
						<h2 class="text-primary">Tambah Data <?=strtoupper($penanganan)?></h2>
						<p>Untuk Subtema: <?= $keterangan->deskripsi ?></p>
					</div>
					<?= form_open_multipart('') ?>
					<input type="hidden" name="id" value="<?= $this->uri->segment("3")?>">
					<input type="hidden" name="penanganan" value="<?= $penanganan ?>">
					<div class="form-group basic">
						<div class="input-wrapper">
							<label class="label">Id Google Drive / ID Youtube <?=strtoupper($penanganan)?> </label>
							<input type="text" name="<?=$penanganan?>" class="form-control" id="<?=$penanganan?>" placeholder="Ex: 10ar2YGqUConiUiYEMtI_EHGsQXsf4kSu / emkOW-s6UiU" value="<?= set_value($penanganan);?>" minlength="11">
							<i class="clear-input">
								<ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
							</i>
							<small>*Kosongkan untuk menghapus</small>
						</div>
						<?php echo form_error($penanganan)?>
					</div>

					<div class="mt-2">
						<button type="submit" class="btn btn-primary btn-lg btn-block">Proses</button>
					</div>

					</form>
					<?= form_close() ?>
				</div>
			</div>
		</div>
	</div>


</div>
