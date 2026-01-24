<link rel="stylesheet" href="<?= URL_P_V ?>css/show.css?v=1.0.3">

<div style="padding-top:8vh;padding-bottom:8vh;color:#acb25a" class="display-5 fw-bold text-center">
    Result Announcement
</div>
<div class="d-flex flex-column align-items-center justify-content-center col-12 col-md-8 text-center w-100 px-3">
    <div class="col-12 col-md-8 col-lg-6 d-flex flex-column gap-2">
        <div class="text-center text-light h2">
            <?= $name_show ?>
        </div>

        <div class="text-light-80 mt-3 mb-2">
            Current Score
        </div>

        <div class="progress-group">
            <div id="progress-line" class="progress-line"></div>
        </div>
    </div>
</div>

<div class="position-absolute end-0 bottom-0 small text-light-80 p-3">
    No. Voted : <span id="count-vote" class="text-light">...</span>
</div>
<script>
    // Sử dụng Query Selector để chọn đúng class của bạn
const progressLine = document.getElementById('progress-line');
const countVote = document.getElementById('count-vote');
const apiUrl = '<?= URL ?>score/get_width/<?= get_action_uri(1) ?>';

async function updateProgressBar() {
    try {
        const response = await fetch(apiUrl);
        if (!response.ok) return;

        const data = await response.json();
        
        if (data && data.value !== undefined) {
            // QUAN TRỌNG: Phải cộng thêm '%' để CSS hiểu được
            // data.value giả sử là 50 -> sẽ thành "50%"
            progressLine.style.width = data.value + '%';
            countVote.innerHTML = data.vote;
            
            console.log("Đã cập nhật width:", data.value + '%');
        }
    } catch (error) {
        console.error('Lỗi kết nối:', error);
    }
}

// Chạy lặp lại mỗi 1 giây
setInterval(updateProgressBar, <?= TIME_CALL_APS ?>);

updateProgressBar();
</script>