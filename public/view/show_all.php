<link rel="stylesheet" href="<?= URL_P_V ?>css/show_all.css">
<div style="margin-top:15vh" class="row mx-0 justify-content-center align-items-center">
    <div class="col-12 col-md-8 mt-lg-5">
        <table class="table text-light">
            <thead>
                <tr>
                    <th class="bg-dark-20 blur-6 text-light border-0">Chương trình</th>
                    <th class="bg-dark-20 blur-6 text-light border-0 col-5">Điểm số</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach (LIST_SHOW as $show): ?>
                    <tr class="align-middle fw-light">
                        <td class="bg-dark-20 blur-6 text-light border-0" class="fw-light"><?= $show['name'] ?></td>
                        <td class="bg-dark-20 blur-6 text-light border-0">
                            <div class="progress-group">
                                <div style="width:<?= rand(70, 100) ?>%" class="progress-line"></div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>