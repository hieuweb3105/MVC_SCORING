<?php

/**
 * Lấy danh sách chương trình sự kiện
 * @return array
 */
function get_list_show() {
    return pdo_query(
        'SELECT * FROM show_event WHERE deleted_at IS NULL'
    );
}

/**
 * Lấy một chương trình theo ID
 * @param mixed $id_show
 * @return array
 */
function get_one_show_by_id($id_show) {
    return pdo_query_one(
        'SELECT * FROM show_event WHERE id_show_event = ? AND deleted_at IS NULL'
        ,$id_show
    );
}