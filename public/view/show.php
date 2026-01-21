<link rel="stylesheet" href="<?= URL_P_V ?>css/show.css">

<div style="padding-top:8vh;padding-bottom:8vh;color:#acb25a" class="display-5 fw-bold text-center">
    Công Bố Kết Quả
</div>
<div class="d-flex flex-column align-items-center justify-content-center col-12 col-md-8 text-center w-100">
    <div class="col-12 col-md-8 col-lg-6 d-flex flex-column gap-2">
        <div class="text-center text-light h2">
        <?= $name_show ?>
    </div>

    <div class="text-light-80 mt-3 mb-2">
        Mức điểm trung bình đạt được
    </div>

    <div class="progess-group">
        <div style="width:<?= rand(70, 100) ?>%" class="progess-line"></div>
    </div>
    </div>
</div>

<div class="position-absolute end-0 bottom-0 small text-light-80 p-3">
    Lượt vote : <span class="text-light"><?= rand(1,100) ?></span>
</div>