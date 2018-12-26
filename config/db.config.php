<?php

if (strpos($_SERVER['SERVER_ADDR'], '192.168.116.20') !== FALSE) {//���Ի���1
    $db_config = array(
        'dbtype' => 'mysql',
        'dbhost' => 'localhost',
        'dbuser' => 'root',
        'dbpass' => '123456',
        'dbname' => 'huiliewang',
        'def' => 'phpyun_',
        'charset' => 'GBK',
        'timezone' => 'PRC',
        'coding' => '64698fc107b59dd7569f2adad3d140c3',
    );

    $db_config1 = array(
        'dbtype' => 'mysql',
        'dbhost' => 'localhost',
        'dbuser' => 'root',
        'dbpass' => '123456',
        'dbname' => 'resume',
        'def' => 'huilie_',
        'charset' => 'utf8',
        'timezone' => 'PRC',
        'coding' => 'utf8',
    );
} elseif (strpos($_SERVER['SERVER_ADDR'], '192.168.116.31') !== FALSE) {//���Ի���2
    $db_config = array(
        'dbtype' => 'mysql',
        'dbhost' => '192.168.116.20',
        'dbuser' => 'root',
        'dbpass' => '123456',
        'dbname' => 'huiliewang',
        'def' => 'phpyun_',
        'charset' => 'GBK',
        'timezone' => 'PRC',
        'coding' => '64698fc107b59dd7569f2adad3d140c3',
    );

    $db_config1 = array(
        'dbtype' => 'mysql',
        'dbhost' => '192.168.116.20',
        'dbuser' => 'root',
        'dbpass' => '123456',
        'dbname' => 'resume',
        'def' => 'huilie_',
        'charset' => 'utf8',
        'timezone' => 'PRC',
        'coding' => 'utf8',
    );
} elseif (strpos($_SERVER['SERVER_ADDR'], '192.168') !== false) {//���ػ���
    $db_config = array(
        'dbtype' => 'mysql',
        'dbhost' => '192.168.116.20',
        'dbuser' => 'root',
        'dbpass' => '123456',
        'dbname' => 'huiliewang',
        'def' => 'phpyun_',
        'charset' => 'GBK',
        'timezone' => 'PRC',
        'coding' => '64698fc107b59dd7569f2adad3d140c3',
    );

    $db_config1 = array(
        'dbtype' => 'mysql',
        'dbhost' => '192.168.116.20',
        'dbuser' => 'root',
        'dbpass' => '123456',
        'dbname' => 'resume',
        'def' => 'huilie_',
        'charset' => 'utf8',
        'timezone' => 'PRC',
        'coding' => 'utf8',
    );
} else {//���ϻ���
    $db_config = array(
        'dbtype' => 'mysql',
        'dbhost' => '10.30.88.15',
        'dbuser' => 'SAP',
        'dbpass' => 'bffebfb01900fe3af8a8633d3b0b7be2',
        'dbname' => 'huiliewang',
        'def' => 'phpyun_',
        'charset' => 'GBK',
        'timezone' => 'PRC',
        'coding' => '64698fc107b59dd7569f2adad3d140c3',
    );

    $db_config1 = array(
        'dbtype' => 'mysql',
        'dbhost' => '10.30.88.15',
        'dbuser' => 'SAP',
        'dbpass' => 'bffebfb01900fe3af8a8633d3b0b7be2',
        'dbname' => 'resume',
        'def' => 'huilie_',
        'charset' => 'utf8',
        'timezone' => 'PRC',
        'coding' => 'utf8', //????cookie????
    );
}

?>