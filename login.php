<?php

// if name is not in the post data, exit
if (!isset($_POST["name"])) {
    header("Location: error.html");
    exit;
}

require_once('xmlHandler.php');

// create the chatroom xml file handler
//create a variable xmlh the hold the file object
//insert the name into chatroom.xml
$xmlh = new xmlHandler("chatroom.xml");
if (!$xmlh->fileExist()) {
    header("Location: error.html");
    exit;
}

//$target_dir ="user_imgs/";
//$target_file_path = $target_dir.basename($_FILES["photo"]["name"]);

//if($_FILES["photo"]["tmp_name"]){
//	move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file_path);
//}else{
//	$target_file_path = $target_dir , "default.png";
//}

// open the existing XML file
$xmlh->openFile();

// get the 'users' element
$users_element = $xmlh->getElement("users");

// create a 'user' element
$user_element = $xmlh->addElement($users_element, "user");

// add the user name
$xmlh->setAttribute($user_element, "name", $_POST["name"]);

//$xmlh->setAttribute($user_element, "img", $target_file_path);

// save the XML file
$xmlh->saveFile();

// set the name to the cookie
setcookie("name", $_POST["name"]);

// Cookie done, redirect to client.php (to avoid reloading of page from the client)
header("Location: client.php");

?>
