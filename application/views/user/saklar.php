<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="avatar-list p-5">
                <center>

                    <?php if ($ledStatus[0]['state'] == 1) : ?>
                        <a href="<?= base_url('off') ?>">
                            <img src="<?= base_url('front_ass/icon/on.png') ?>" alt="" width="140px">
                        </a>
                        <h1 class="mt-3">Hidup</h1>


                    <?php else : ?>
                        <a href="<?= base_url('on') ?>">
                            <img src="<?= base_url('front_ass/icon/off.png') ?>" alt="" width="140px">
                        </a>
                        <h1 class="mt-3">Mati</h1>
                    <?php endif ?>
                </center>


            </div>
        </div>
    </div>
</div>