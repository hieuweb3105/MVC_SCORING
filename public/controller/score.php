<?php

// Case : Lưu chấm điểm
if(isset($_POST['value_score']) && $_POST['value_score'] && isset($_POST['id_show']) && $_POST['id_show']) {
    $input_score = $_POST['value_score'];
    $input_id_show = $_POST['id_show'];
    // test_array([
    //     'time_submit' => date('H:i:s d/m/Y'),
    //     'value_score' => $input_score,
    //     'button_link' => '<a href="/">Về Trang Chủ</a>'
    // ]);
    toast_create('success','Chấm điểm thành công !');
    route('show/'.$input_id_show);
}


view('public','score','Kết quả',null);