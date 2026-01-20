<link rel="stylesheet" href="<?= URL_P_V ?>css/btc_home.css">

<?php if ($_SESSION['admin_verify'] !== 'verify'): ?>
    <div style="height:80vh" class="d-flex align-items-center justify-content-center px-3">
        <div class="d-flex flex-column gap-3 col-12 col-md-6 col-lg-4">
            <form action="/btc" method="post" class="d-flex flex-column align-items-center">
                <label for="admin_verify" class="text-light mb-2">Nhập mật khẩu xác thực</label>
                <input id="admin_verify" type="password" name="admin_verify" class="form-control text-center">
                <button id="btn_verify" disabled type="submit" class="btn btn-outline-light mt-3">Xác thực</button>
            </form>
        </div>
    </div>

<?php else: ?>

    <div class="row justify-content-center align-items-center">
        <div class="col-12 col-md-8 mt-lg-5">
            <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th>Chương trình</th>
                    <th>Trạng thái</th>
                    <th>Lượt vote</th>
                    <th>Điểm</th>
                    <th class="text-center">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach (LIST_SHOW as $show): ?>
                    <tr class="align-middle fw-light">
                        <th class="fw-light"><?= $show['name'] ?></th>
                        <td><?= 'Đã chấm' ?></td>
                        <td class="text-center"><?= rand(50, 80) ?></td>
                        <td class="text-center"><?= rand(70, 100) ?></td>
                        <td class="d-flex justify-content-end flex-column flex-lg-row gap-1">
                            <a href="/show/<?= $show['id'] ?>" class="btn btn-sm btn-outline-light"><i class="bi bi-easel"></i><small>Trình chiếu</small></a>
                            <a href="/pause/<?= $show['id'] ?>" class="btn btn-sm btn-outline-light"><i class="bi bi-pause"></i><small>Dừng chấm</small></a>
                            <a href="/pause/<?= $show['id'] ?>" class="btn btn-sm btn-outline-light"><i class="bi bi-play"></i><small>Bắt đầu chấm</small></a>
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