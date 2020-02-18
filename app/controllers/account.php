<?php 	


if (!empty($routes[2])) {

	if($routes[2] == 'authorize'){
		$title = 'срт'; 
		require_once(APP_DIRECTORY.'app/views/login.blade.php');
	}

	if($routes[2] == 'registration'){
		$title = 'срт';  
		require_once(APP_DIRECTORY.'app/views/register.blade.php');
	}

}
				






 ?>