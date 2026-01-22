<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= WEB_DESCRIPTION ?>">
    <meta name="keywords" content="<?= WEB_KEYWORD ?>">
    <title><?= $title ? WEB_NAME . ' | ' . $title : '' ?></title>
    <link rel="icon" href="<?= WEB_FAVICON ?>" type="image/png">
    <!-- CDN Bootstrap Icon-->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css">
    <!-- CDN Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css">
    <!-- CDN Animate -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- CDN AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- CDN Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- CSS Custom -->
    <link rel="stylesheet" href="<?= URL_P_V ?>css/main.css?v=1.0.6">
    <link rel="stylesheet" href="<?= URL_P_V ?>css/header.css?v=1.0.3">
    <link rel="stylesheet" href="<?= URL_P_V ?>css/footer.css">
</head>

<?= toast_show() ?>

<body class="">

    <div class="linear-bg"></div>

    <div
        class="d-flex flex-wrap justify-content-lg-end p-3 gap-2 mb-5  animate__animated animate__fadeIn animate__delay-1s">
        <?php if ($_SESSION['btc'] === 'verify'): ?>
            <a href="/config" class="btn btn-sm btn-outline-light"> <i class="bi bi-gear"></i> Cấu hình</a>
            <a href="/show_all" class="btn btn-sm btn-outline-light"> <i class="bi bi-easel"></i> Trình chiếu tất cả</a>
            <a href="/btc" class="btn btn-sm btn-outline-light"> <i class="bi bi-list"></i> Danh sách tiết mục</a>
            <a href="/" class="btn btn-sm btn-outline-light"> <i class="bi bi-house"></i> Trang chủ</a>
        <?php else: ?>
            <a <?= !($page == 'home') ?: 'hidden' ?> href="/" class="btn btn-sm btn-outline-light"> <i class="bi bi-house"></i>
                Trang chủ</a>
        <?php endif ?>
    </div>