<?php

// Var
$name_show = '';

// Case : Lấy ID Show
if(get_action_uri(1)) {
    $input_id_show = get_action_uri(1);
    foreach (LIST_SHOW as $show) {
        if($show['id'] == $input_id_show) {
            $name_show = $show['name'];
            break;
        }
    }
    if(!$name_show) view_error(400);
}else view_error(400);

// Data
$data = [
    'name_show' => $name_show,
];

view('public','event','Chấm điểm',$data);