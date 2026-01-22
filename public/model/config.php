<?php

/**
 * Lấy giá trị của config
 * @param mixed $param
 * @return int|string
 */
function config_get_value($param) {
    return pdo_query_value(
        'SELECT '.$param.' FROM config '
    );
}