<?php 

$title_page = 'Dashboard'; 

$users = $mydb->getAllItems('users');


if(!empty(SESSION::get('user'))){
	$user = SESSION::get('user');
} else {

	    header("location: ".APP_BASE_URL."account/authorize/");
	    die();
}
require_once(APP_DIRECTORY.'app/views/main.blade.php');
?>