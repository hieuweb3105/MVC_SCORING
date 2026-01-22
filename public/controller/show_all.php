<?php

// [AUTHOR]
if($_SESSION['btc'] !== 'verify') route('btc');


# [MODEL]
model('public','show_event');
model('public','score');
model('public','config');

# [DATA]
$data = [
    'list_show' => get_list_show()
];

# [RENDER]
view('public','show_all','Công bố kết quả',$data);