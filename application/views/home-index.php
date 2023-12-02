<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ZIYU TRACKER</title>
    <!-- load style and style.cdn -->
    <?php $this->load->view('home-partials/style'); ?>
</head>

<body>
    <!-- load navbar -->
    <?php $this->load->view('home-partials/navbar'); ?>

    <?php $this->load->view('home/' . $page); ?>


    <?php if ($title == "Application") : ?>
    <?php else : ?>
        <?php $this->load->view('home-partials/footer'); ?>

    <?php endif ?>
    <!-- ====== Back To Top Start ====== -->
    <a class="back-to-top">
        <i class="lni lni-chevron-up"> </i>
    </a>
    <!-- ====== Back To Top End ====== -->

<!-- load script -->
<?php $this->load->view('home-partials/script'); ?>


</body>

</html>