<?php

# [AUTHOR]
if($_SESSION['btc'] !== 'verify') route('btc');

# [MODEL]
model('public','config');
model('public','show_event');

# [HANDLE]
// Case : Thay đổi giá trị guest
if(isset($_POST['config_guest']) && $_POST['config_guest']) {
    // input
    $input_value_guest = $_POST['config_guest'];
    // validate
    if(!ctype_digit($input_value_guest)) {
        toast_create('failed','Giá trị phải là số nguyên');
        route('/config');
    }
    // update
    config_update('config_guest',$input_value_guest);
    // route
    toast_create('success','Lưu thành công');
    route('/config');
    

}

# [DATA]
$data = [

];

# [RENDER]
view('public','config','Cấu hình',$data);