<link rel="stylesheet" href="<?= URL_P_V ?>css/home.css">

<div class="d-flex align-items-center justify-content-center px-3">
    <div class="d-flex flex-column gap-3 col-12 col-md-8 col-lg-6">
        <h4 class="text-light text-center mb-5">ON Mixtape Showcase: Real-time Scoring</h4>
        <?php foreach ($list_show as $show): 
            $case_redirect = 'event';
            extract($show);
            $get_score_here = get_one_score_by_token_guest($id_show_event);
            if($get_score_here) $case_redirect = 'show';
        ?>
            <a href="/<?= $case_redirect ?>/<?= $id_show_event?>" class="btn btn-outline-light text-wrap py-3 ps-4 d-flex flex-column flex-lg-row <?= ($state_show_event=='close') ? 'disabled' : '' ?>">
                <div class=""><?= $name_show_event ?></div>
                <?php if($state_show_event == 'open') : ?>
                    <div class="d-none d-lg-block">|</div>
                    <div class="text-light-60"><?= ($get_score_here) ? 'Voted : '.$get_score_here : 'Not voted' ?></div>
                <?php endif ?>
                <div class="position-absolute start-0 top-10 ps-2 ps-lg-3 d-flex align-items-center">
                    <?php if($state_show_event == 'open') : ?>
                        <i class="bi bi-dot text-success fs-1 animate__animated animate__zoomIn animate__infinite"></i>
                        <small class="d-none d-lg-block">Opened</small>
                    <?php else : ?>
                        <i class="bi bi-dot text-danger fs-3 animate__animated animate__fadeIn"></i>
                        <small class="d-none d-lg-block">Closed</small>
                    <?php endif ?>
                </div>
            </a>
        <?php endforeach ?>
    </div>
</div>