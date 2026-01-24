<?php

# [VARIABLE]
$sum_score = 0;

# [MODEL]
model('public','score');
model('public','config');
model('public','show_event');

// Case : Lưu chấm điểm
if(isset($_POST['value_score']) && $_POST['value_score'] && isset($_POST['id_show']) && $_POST['id_show']) {
    // input
    $input_id_show = $_POST['id_show'];
    $input_score = $_POST['value_score'];
    // validate state show
    if(show_get_state($input_id_show) == 'close') {
        toast_create('failed','Tiết mục này đã đóng bình chọn');
        route('show/'.$input_id_show);
    }
    // validate cofirm scored
    if(get_one_score_by_token_guest($input_id_show)) view_error(400);
    // save
    save_score($input_id_show,$input_score);
    // route
    toast_create('success','Chấm điểm thành công !');
    route('show/'.$input_id_show);
}

// Case : Lấy phần trăm điểm tiết mục
if(get_action_uri(1) === 'get_width' && get_action_uri(2)) {
    // input
    $id_show = get_action_uri(2);
    // return
    view_json(200,[
        'value' => get_average_score($id_show),
        'vote' => count_turn_vote($id_show),
    ]);
}

view_json(400,[
    'message' => 'Bad Request',
    'go_home' => URL
]);