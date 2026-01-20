<?php

// Case : Lưu chấm điểm
if(isset($_POST['value_score']) && $_POST['value_score']) {
    $input_score = $_POST['value_score'];
    test_array([
        'time_submit' => date('H:i:s d/m/Y'),
        'value_score' => $input_score,
        'button_link' => '<a href="/">Về Trang Chủ</a>'
    ]);
}


view('public','score','Kết quả',null);