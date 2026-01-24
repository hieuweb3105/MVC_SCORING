<link rel="stylesheet" href="<?= URL_P_V ?>css/btc_home.css">
<div style="padding-top:4vh;padding-bottom:4vh;color:#acb25a" class="display-5 fw-bold text-center">
    Danh Sách Tiết Mục
</div>
<div class="row justify-content-center align-items-center">
    <div class="col-12 col-md-8 mt-lg-5">
        <table class="table table-dark table-hover">
        <thead>
            <tr class="align-middle">
                <th class="bg-dark-80 blur-6">Chương trình</th>
                <th class="text-start bg-dark-80 blur-6">Trạng thái</th>
                <th class="text-center bg-dark-80 blur-6">Lượt vote</th>
                <th class="text-end bg-dark-80 blur-6">Điểm</th>
                <th class="text-end pe-lg-3 bg-dark-80 blur-6">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($list_show as $show): 
            extract($show);
            $get_score_here = get_one_score_by_token_guest($id_show_event);
            ?>
                <tr class="align-middle fw-light">
                    <th class="fw-light bg-dark-80 blur-6"><?= $show['name_show_event'] ?></th>
                    <td class="text-start bg-dark-80 blur-6">
                        <div class="d-flex align-items-center justify-content-start gap-2">
                            <?php if($state_show_event == 'open') : ?>
                                <i class="bi bi-dot text-success animate__animated animate__zoomIn animate__infinite"></i>
                                <small class="">Đang mở</small>
                            <?php else : ?>
                                <i class="bi bi-dot text-danger animate__animated animate__fadeIn"></i>
                                <small class="">Đang đóng</small>
                            <?php endif ?>
                        </div>
                    </td>
                    <td class="text-center bg-dark-80 blur-6"><?= count_turn_vote($id_show_event) ?></td>
                    <td class="text-end bg-dark-80 blur-6"><?= sum_score($id_show_event) ?: 0 ?> / <?= config_get_value('config_guest') * 10 ?></td>
                    <td class="text-end bg-dark-80 blur-6">
                        <div class="d-flex justify-content-end flex-column flex-lg-row">
                            <?php if(show_get_state($id_show_event) == 'open') : ?>
                            <a href="btc/close_show/<?= $id_show_event ?>" class="btn btn-sm btn-outline-light w-100 ms-2 px-0" title="Tạm dừng chấm điểm"><i class="bi bi-pause"></i> <span class="d-none d-md-block">Đóng</span><a>
                            <?php else : ?>
                            <a href="btc/open_show/<?= $id_show_event ?>" class="btn btn-sm btn-outline-light w-100 ms-2 px-0" title="Tiếp tục chấm điểm"><i class="bi bi-play"></i> <span class="d-none d-md-block">Mở</span></a>
                            <?php endif ?>
                            <a href="/show/<?= $id_show_event ?>" class="btn btn-sm btn-outline-light w-100 ms-2 px-0" title="Trình chiếu điểm"><i class="bi bi-easel"></i> <span class="d-none d-md-block">Chiếu</span></a>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    </div>
</div>

