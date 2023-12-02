<!doctype html>
<html lang="en" dir="ltr">

<head>
    <?php $this->load->view('partials/header'); ?>
</head>

<body class="app">
    <div id="loading">
        <img src="<?= base_url('front_ass') ?>/images/other/loader.svg" class="loader-img" alt="Loader">
    </div>
    <div class="page">
        <div class="page-main">
            <?php $this->load->view('partials/topbar'); ?>
            <?php $this->load->view('partials/sidebar'); ?>
            <div class="app-content">
                <div class="container">
                    <div class="page-header">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fe fe-life-buoy mr-1"></i> Pages</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                        </ol>
                    </div>
                    <?php $this->load->view('/' . $content) ?>
                </div>
            </div>
        </div>
        <?php $this->load->view('partials/footer'); ?>
    </div>
    <?php $this->load->view('partials/scripts'); ?>
</body>

</html>