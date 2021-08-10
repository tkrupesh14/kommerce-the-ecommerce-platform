<?php
session_start();
$con=mysqli_connect("localhost","root","","kommerce");

define('SERVER_PATH', $_SERVER['DOCUMENT_ROOT']. '/kommerce/');
define('SITE_PATH', 'http://localhost/kommerce/');
define('PRODUCT_IMAGE_SERVER_PATH', SERVER_PATH. 'media/product/');
define('PRODUCT_IMAGE_SITE_PATH', SITE_PATH. 'media/product/');
?>