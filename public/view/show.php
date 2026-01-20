<link rel="stylesheet" href="<?= URL_P_V ?>css/show.css">
<div class="d-flex align-items-center justify-content-center flex-column gap-2 py-3">
    <div class="h2 text-light text-center mt-5">
        <?= $name_show ?>
    </div>
    <div class="fs-5 text-score">Số điểm chấm</div>
    <span data-score="<?= rand(70, 100) ?>" class="score-value"></span>

</div>

<script>
    document.querySelectorAll('.score-value').forEach(el => {
        const target = parseInt(el.getAttribute('data-score'));
        const duration = 4000; // Tổng thời gian chạy (2 giây)
        let startTime = null;

        function animate(currentTime) {
            if (!startTime) startTime = currentTime;
            const progress = Math.min((currentTime - startTime) / duration, 1);

            // Công thức Ease Out: Giúp số tăng nhanh lúc đầu và chậm dần về sau
            // progress = 1 - (1 - progress) ^ 3 (Cubic Ease Out)
            const easeProgress = 1 - Math.pow(1 - progress, 3);

            const currentValue = Math.floor(easeProgress * target);
            el.textContent = currentValue;

            if (progress < 1) {
                requestAnimationFrame(animate);
            }
        }

        requestAnimationFrame(animate);
    });
</script>