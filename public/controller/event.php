<?php

# [MODEL]
model('public','show_event');
model('public','score');

# [VARIABLE]
$name_show = '';

# [HANDLE]
// Case : Lấy ID Show
if(get_action_uri(1)) {
    // input
    $input_id_show = get_action_uri(1);
    // get
    $get_show = get_one_show_by_id($input_id_show);
    // validate exist
    if(!$get_show) view_error(400);
    // validate state show
    if(show_get_state($input_id_show) == 'close') {
        toast_create('failed','Tiết mục chưa được mở bình chọn.');
        route();
    }
    // validate confirm scored
    if(get_one_score_by_token_guest($input_id_show)) {
        toast_create('failed','Bạn đã bình chọn rồi.');
        route('show/'.$input_id_show);
    }
}else view_error(400);

# [DATA]
$data = [
    'name_show' => $get_show['name_show_event'],
];

# [RENDER]
view('public','event','Chấm điểm',$data);