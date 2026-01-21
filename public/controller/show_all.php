<?php

// Case : Author BTC
if($_SESSION['btc'] !== 'verify') route('btc');

view('public','show_all','Công bố kết quả',null);