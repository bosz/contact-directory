<?php 

	/*TEST TO SEE IF IT CHANGES*/
	/*if(!sedna_execute('for $user in doc("users")//user[@email="'.$email.'"] return $user')){
		sedna_load('<users></users>', 'users');
		echo ('<div class="alert alert-warning">Could not execute query: ' . sedna_error() . "</div>");
	}else{
		echo "<pre>";
		var_dump(sedna_result_array());
		echo "</pre>";
	}*/

	if (isset($_POST['update_profile'])) {
		require_once "functions.php";
		$email = $_POST['email'];
  		$password = md5($_POST['password']);
  		$first_name = $_POST['first_name'];
	    $last_name = $_POST['last_name'];
	    $visible = isset($_POST['visible']) ? $_POST['visible'] : "off";
	    //Upload image 

	    if ($_FILES['file']['name'] == "") { 
	    	$image = $_SESSION['image']; //retain image
	    }else {
	    	$image = uploadImage($_FILES, 'img/users/'); //upload new image
	    }

		$query = 
		'UPDATE replace $user in doc("users")/user[@email="'.$email.'"]
		with
		<user email="'.$email.'">
			<email>strange.figure@localhost.com</email>
			{$user/password}
			<first_name>'.$first_name.'</first_name>
			<last_name>'.$last_name.'</last_name>
			<visible>'.$visible.'</visible>
			<image>'.$image.'</image>
		</user>';

		if (!sedna_execute($query)) {
	      die('Could not add the user\'s information : ' . sedna_error() . "\n");
	    }

	    /*remove previous image and update session with new image*/
	    //unlink($_SESSION['image']);
	    $_SESSION['image'] = $image;
	}
	/*just nornal page load so need to pull data from the database and fill the form*/
	else{
	}	
?>