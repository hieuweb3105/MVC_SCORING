<?php


# [MODEL]
model('public','score');

// Case : Lưu chấm điểm
if(isset($_POST['value_score']) && $_POST['value_score'] && isset($_POST['id_show']) && $_POST['id_show']) {
    // input
    $input_id_show = $_POST['id_show'];
    $input_score = $_POST['value_score'];
    // save
    save_score($input_id_show,$input_score);
    // route
    toast_create('success','Chấm điểm thành công !');
    route('show/'.$input_id_show);
}


view('public','score','Kết quả',null);