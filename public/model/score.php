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
 * @return array
 */
function get_list_score_by_token_guest() {
    if(!empty($_COOKIE['token_guest'])) {
        return pdo_query(
            'SELECT * FROM score WHERE token_guest = ?',
            $_COOKIE['token_guest']
        );
    }
    return [];
}

/**
 * Lấy danh sách đã chấm điểm theo id show
 * @param mixed $id_show
 * @return array
 */
function get_list_score_by_id_show($id_show) {
    if(!empty($_COOKIE['token_guest'])) {
        return pdo_query(
            'SELECT * FROM score WHERE id_show_event = ?',
            $id_show
        );
    }
    return [];
}

function count_turn_vote($id_show) {
    return pdo_query_value(
        'SELECT count(id_score) FROM score WHERE id_show_event = ?',
        $id_show
    );
}

function sum_score($id_show) {
    return pdo_query_value(
        'SELECT SUM(score) FROM score WHERE id_show_event = ?'
        ,$id_show
    );
}

function get_average_score($id_show) {
    // var
    $sum_score = 0;
    // get list
    $list_score = get_list_score_by_id_show($id_show);
    // sum score
    if(!empty($list_score)) {
        foreach ($list_score as $score) {
            $sum_score += $score['score'];
            $avarage_score = ($sum_score/(config_get_value('config_guest')*10))*100;
        }
        return ($avarage_score > 100) ? 100 : $avarage_score;
    }
    return 0;
}

function score_reset_all() {
    pdo_execute(
        'DELETE FROM score'
    );
}

function score_reset_by_id($id_show) {
    pdo_execute(
        'DELETE FROM score WHERE id_show_event = ?'
        ,$id_show
    );
}