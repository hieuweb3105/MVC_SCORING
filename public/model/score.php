<?php

/**
 * Lưu điểm chấm của guest
 * @param mixed $id_show
 * @param mixed $value_score
 * @return void
 */
function save_score($id_show,$value_score) {
    pdo_execute(
        'INSERT INTO score (id_show_event,token_guest,score) VALUES(?,?,?)'
        ,$id_show,$_COOKIE['token_guest'],$value_score
    );
}

/**
 * Lấy danh sách đã chấm điểm theo token guest
 * @return array | string
 */
function get_list_score_by_token_guest() {
    if(!empty($_COOKIE['token_guest'])) {
        $list = pdo_query(
            'SELECT * FROM score WHERE token_guest = ?',
            $_COOKIE['token_guest']
        );
        if($list) return $list;
    }
    return '';
}