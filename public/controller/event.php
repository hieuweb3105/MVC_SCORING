<?php

# [MODEL]
model('public','show_event');

# [VARIABLE]
$name_show = '';

# [HANDLE]
// Case : Lấy ID Show
if(get_action_uri(1)) {
    // input
    $input_id_show = get_action_uri(1);
    // get
    $get_show = get_one_show_by_id($input_id_show);
    // validate
    if(!$get_show) view_error(400);
}else view_error(400);

# [DATA]
$data = [
    'name_show' => $get_show['name_show_event'],
];

# [RENDER]
view('public','event','Chấm điểm',$data);