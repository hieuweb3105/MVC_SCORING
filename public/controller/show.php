<?php

# [MODEL]
model('public','show_event');


# [VARIABLE]
$name_show = '';
$show_event = '';

# [HANDLE]
// Case : Lấy ID Show
if(get_action_uri(1)) {
    $input_id_show = get_action_uri(1);
    $show_event = get_one_show_by_id($input_id_show);
    if(!$show_event) view_error(400);
}else view_error(400);

# [DATA]
$data = [
    'name_show' => $show_event['name_show_event'],
];

# [RENDER]
view('public','show','Trình chiếu',$data);