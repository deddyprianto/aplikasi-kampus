<div class="container">


    <h4 class="text-success text-bayangan mb-5">FORUM CHAT GROUP APL N-HKBP HATOPAN</h4>

    <div class="row">

        <div class="col-lg-7">


            <div class="card-body" style="height: 300px; overflow-y: scroll; background-image: url( <?= base_url('asset/img/team.svg'); ?>) ; ">

                <?php foreach ($chatt as $cht) { ?>

                    <?php if ($cht->pengirim == $this->session->userdata('name')) {  ?>

                        <div class="col-md">

                            <div class="card mb-2 bg-success">

                                <div class="card-header mb-2">


                                    <strong style="font-size: 15px;" class="float-right text-danger">saya :
                                        <small><?= date('D-M-Y h:i:s', strtotime($cht->waktu)); ?></small><br />

                                        <p class="text-muted"><?= $cht->teks; ?></p>
                                    </strong>

                                </div>
                            </div>

                        </div>
                    <?php } else { ?>
                        <div class="col-md">

                            <div class="card mb-2 bg-primary">
                                <div class="card-header mb-2">
                                    <strong style="font-size: 15px;" class=" float-left text-success"><?= $cht->pengirim; ?>:
                                        <small><?= date('D-M-Y h:i:s', strtotime($cht->waktu)); ?></small><br />
                                        <p class="text-muted"><?= $cht->teks; ?></p>
                                    </strong>
                                </div>
                            </div>

                        </div>
                    <?php } ?>
                <?php } ?>




            </div>

        </div>

    </div>



    <div class="row mt-5">

        <div class="col-md-7">

            <form method="post" action="<?= base_url('chat/kirim'); ?>">
                <div class="col-md">
                    <div class="input-group">
                        <input type="text" name="pesan" class="form-control" placeholder="Tulis pesan...">
                    </div>
                    <button type="submit" class="btn btn-success mt-2 btn-block">Kirim</button>
                </div>
            </form>

        </div>

    </div>



</div>
</div>