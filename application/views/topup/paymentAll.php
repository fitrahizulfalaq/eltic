<div id="appCapsule">
    <div class="section mt-2">
        <div class="section-heading">
            <h2 class="title">Riwayat Top UP</h2>
            <!-- <a href="<?= base_url("pendaftaran/dataAll/") ?>" class="link">Semua</a> -->
        </div>
        <div class="card">
            <?php $this->view('message') ?>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" width="50%">Nama</th>
                            <th scope="col" width="30%">Nominal</th>
                            <th scope="col" width="20%">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($row->result() as $key => $data) {; ?>
                            <tr>
                                <td><?= $this->fungsi->pilihan("tb_user",$data->user_id)->row("nama") ?></td>                               
                                <td>Rp. <?= $data->Amount ?></td>                               
                                <td><?= $data->SuccessDate ?></td>                               
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<br>
<br>