<!-- AOS JS -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>

</body>

<!-- JS custom -->

<!-- CDN JS Bootstrap 5 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
<!-- CDN JQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<?php if(BOOL_TEST) : ?>
<div class="text-light-40 small position-absolute bottom-0 pb-1 ps-2">
    <div class="">
        <small>[test area]</small>
    </div>
    <?php model('public','score') ?>
    ID GUEST : <?= $_COOKIE['token_guest'] ?? 'value not found' ?>
    <?php foreach (get_list_score_by_token_guest() as $score) : ?>
        <div class="d-flex gap-1 small">
        <div class="">
            ID SHOW : <a href="/show/<?= $score['id_show_event'] ?>" class="text-light-40"><?= $score['id_show_event'] ?></a> |
        </div>
        <div class="">
            SCORE : <?= $score['score'] ?>
        </div>
    </div>
    <?php endforeach ?>
</div>
<?php endif ?>
</html>