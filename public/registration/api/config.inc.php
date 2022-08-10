<?php

//Defining constants
############################
## Develop BY:Arvind Kumar Mishra
############################

if ($_SERVER['HTTP_HOST'] == 'localhost') {
    $host_name = 'localhost';
    $host_username = 'root';
    $host_password = '';
    $host_dbname = 'toplad';
    $base_url = 'http://localhost/raghav-academy/';
    $base_path = 'D:/xampp/htdocs/raghav-academy/';
    $web_url = 'http://localhost/raghav-academy/admin/';
} else {
    $host_name = 'localhost';
    $host_username = 'root';
    $host_password = 'p6M+Zv57?*9C2E#5V+cw';
    $host_dbname = 'toplad';
    $base_url = 'https://toplad.in/registration/';
    $base_path = '/var/www/html/public/registration/';
    $web_url = 'raghav-goel-academy/admin/';
}

define('MYSQL_HOSTNAME', $host_name);
define('MYSQL_USERNAME', $host_username);
define('MYSQL_PASSWORD', $host_password);
define('MYSQL_DATABASE', $host_dbname);

define('BASE_URL', $base_url);
define('WEB_URL', $web_url);
define('BASE_PATH', $base_path);
define('API_URL', BASE_URL.'api/' );
define('API_PATH', BASE_PATH.'api/' );
define('UPLOADS_URL', API_URL . 'uploads/');
define('UPLOADS_PATH', API_PATH . 'uploads/');

define('STATUS_OK', 200);
define('STATUS_BAD_REQUEST', 400);
define('STATUS_UNAUTHORIZED', 401);
define('PARAMETER_MISSING', 422);
define('STATUS_INTERNAL_SERVER_ERROR', 500);

?>