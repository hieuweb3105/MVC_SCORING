<?php

// test_array($_SESSION);

# [MODEL]
model('public','show_event');
model('public','config');
model('public','score');

# [DATA]
$data = [
    'list_show' => get_list_show()
];

# [RENDER]
view('public','home','Home',$data);