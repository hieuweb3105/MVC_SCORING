<?php

// test_array($_SESSION);

# [MODEL]
model('public','show_event');

# [DATA]
$data = [
    'list_show' => get_list_show()
];

# [RENDER]
view('public','home','Trang chủ',$data);