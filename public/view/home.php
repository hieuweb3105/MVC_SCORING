<link rel="stylesheet" href="<?= URL_P_V ?>css/home.css">

<div class="d-flex align-items-center justify-content-center px-3">
    <div class="d-flex flex-column gap-3 col-12 col-md-8 col-lg-6">
        <h4 class="text-light text-center mb-5">Chọn tiết mục để chấm điểm</h4>
        <?php foreach ($list_show as $show): 
            extract($show);
            $get_score_here = get_one_score_by_token_guest($id_show_event);
            if($get_score_here) $case_redirect = 'show';
            else $cass_redirect = 'event';
        ?>
            <a href="/<?= $case_redirect ?>/<?= $id_show_event?>" class="btn btn-outline-light text-wrap py-3 ps-4 <?= ($state_show_event=='close') ? 'disabled' : '' ?>">
                <?= $name_show_event ?>
                <?php if($state_show_event == 'open') : ?>
                     | <span class="small"><?= ($get_score_here) ? 'Đã bình chọn : '.$get_score_here : 'Chưa bình chọn' ?></span>
                <?php endif ?>
                <d class="position-absolute start-0 top-10 ps-2 ps-lg-3 d-flex align-items-center">
                    <?php if($state_show_event == 'open') : ?>
                        <i class="bi bi-dot text-success fs-1 animate__animated animate__zoomIn animate__infinite"></i>
                        <small class="d-none d-lg-block">Đang mở</small>
                    <?php else : ?>
                        <i class="bi bi-dot text-danger fs-3 animate__animated animate__fadeIn"></i>
                        <small class="d-none d-lg-block">Đang đóng</small>
                    <?php endif ?>
                </d>
            </a>
        <?php endforeach ?>
    </div>
</div>