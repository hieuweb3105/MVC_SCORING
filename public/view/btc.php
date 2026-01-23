<link rel="stylesheet" href="<?= URL_P_V ?>css/btc_home.css">

<?php if ($_SESSION['btc'] !== 'verify'): ?>
    <div class="d-flex flex-column align-items-center justify-content-center px-3">
        
    <div style="padding-top:8vh;padding-bottom:8vh;color:#acb25a" class="display-5 fw-bold text-center">
        BTC Site
    </div>
        <div class="d-flex flex-column gap-3 col-12 col-md-6 col-lg-4">
            <form action="/btc" method="post" class="d-flex flex-column align-items-center">
                <label for="admin_verify" class="text-light mb-2">Nhập mật khẩu xác thực</label>
                <input id="admin_verify" type="password" name="admin_verify" class="form-control text-center">
                <button id="btn_verify" disabled type="submit" class="btn btn-outline-light mt-3">Xác thực</button>
            </form>
        </div>
    </div>

<?php else: ?>
    <div style="padding-top:4vh;padding-bottom:4vh;color:#acb25a" class="display-5 fw-bold text-center">
        Danh Sách Tiết Mục
    </div>
    <div class="row justify-content-center align-items-center">
        <div class="col-12 col-md-8 mt-lg-5">
            <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th>Chương trình</th>
                    <th class="text-center">Trạng thái</th>
                    <th class="text-center">Lượt vote</th>
                    <th class="text-end">Điểm</th>
                    <th class="text-end pe-lg-3">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($list_show as $show): ?>
                    <tr class="align-middle fw-light">
                        <th class="fw-light"><?= $show['name_show_event'] ?></th>
                        <td class="text-center"><?= '...' ?></td>
                        <td class="text-center"><?= count_turn_vote($show['id_show_event']) ?></td>
                        <td class="text-end"><?= sum_score($show['id_show_event']) ?: 0 ?> / <?= config_get_value('config_guest') * 10 ?></td>
                        <td class="d-flex justify-content-end flex-column flex-lg-row gap-1">
                            <a href="/show/<?= $show['id_show_event'] ?>" class="btn btn-sm btn-outline-light" title="Trình chiếu điểm"><i class="bi bi-easel"></i></a>
                            <a href="/pause/<?= $show['id_show_event'] ?>" class="btn btn-sm btn-outline-light disabled" title="Tạm dừng chấm điểm"><i class="bi bi-pause"></i><a>
                            <a href="/pause/<?= $show['id_show_event'] ?>" class="btn btn-sm btn-outline-light disabled" title="Tiếp tục chấm điểm"><i class="bi bi-play"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        </div>
    </div>

<?php endif ?>

<script>
    const adminInput = document.getElementById('admin_verify');
    const submitBtn = document.getElementById('btn_verify');

    adminInput.addEventListener('input', function () {
        // Kiểm tra nếu giá trị input sau khi xóa khoảng trắng (trim) không trống
        if (adminInput.value.trim().length > 0) {
            submitBtn.disabled = false;
        } else {
            submitBtn.disabled = true;
        }
    });
</script>