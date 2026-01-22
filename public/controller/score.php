<?php

# [VARIABLE]
$sum_score = 0;

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

// Case : Lấy phần trăm điểm tiết mục
if(get_action_uri(1) === 'get_width' && get_action_uri(2)) {
    // input
    $id_show = get_action_uri(2);
    // get list
    $list_score = get_list_score_by_id_show($id_show);
    // sum score
    if(!empty($list_score)) {
        foreach ($list_score as $score) {
            $sum_score += $score['score'];
            $avarage_score = ($sum_score/(LIMIT_GUEST*10))*100;
        }
    }
    view_json(200,[
        'value' => $avarage_score,
        'vote' => count_turn_vote($id_show),
    ]);
}

view_json(400,[
    'message' => 'Bad Request'
]);