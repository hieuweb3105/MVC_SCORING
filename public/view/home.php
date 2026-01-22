<link rel="stylesheet" href="<?= URL_P_V ?>css/home.css">

<div class="d-flex align-items-center justify-content-center px-3">
    <div class="d-flex flex-column gap-3 col-12 col-md-8 col-lg-6">
        <h4 class="text-light text-center mb-5">Chọn tiết mục để chấm điểm</h4>
        <?php foreach ($list_show as $show): extract($show) ?>
            <a href="/event/<?= $id_show_event?>" class="btn btn-outline-light text-wrap py-3"><?= $name_show_event ?></a>
        <?php endforeach ?>
    </div>
</div>