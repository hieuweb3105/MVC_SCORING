<?php

# [MODEL]
model('public','show_event');
model('public','score');
model('public','config');

# [HANDLE]
// Case : Xác thực quyền BTC
if(isset($_POST['admin_verify']) && $_POST['admin_verify']) {
    $input_verify = $_POST['admin_verify'];
    if(password_verify($input_verify,'$2y$10$3q4JO0xnkM1rQk/TnwLj/etaTfB7UWIPJElvqWqCQK0TsdUvDh99O')) {
        $_SESSION['btc'] = 'verify';
        toast_create('success','Xác thực thành công !');
        route('btc');
    }else toast_create('failed','Mật khẩu xác thực không chính xác !');
}

// Case : Đóng tiết mục
if(get_action_uri(1) == 'close_show' && get_action_uri(2)) {
   // get
   $input_id_show = get_action_uri(2);
   // validate
   if(!get_one_show_by_id($input_id_show)) view_error(400);
   // update
   show_close_by_id($input_id_show);
   // toast
   toast_create('success','Đóng bình chọn thành công');
   // route
   route('/btc');

}

// Case : Mở tiết mục
if(get_action_uri(1) == 'open_show' && get_action_uri(2)) {
   // get
   $input_id_show = get_action_uri(2);
   // validate
   if(!get_one_show_by_id($input_id_show)) view_error(400);
   // update
   show_open_by_id($input_id_show);
   // toast
   toast_create('success','Mở bình chọn thành công');
   // route
   route('/btc');
}

# [DATA]
$data = [
    'list_show' => get_list_show()
];

# [RENDER]
// Site verify
if($_SESSION['btc'] !== 'verify') view('public','btc_verify','Xác thực',$data);
// Site main
view('public','btc','Setting',$data);