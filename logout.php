<?php

require_once('xmlHandler.php');

if (!isset($_COOKIE["name"])) {
    header("Location: error.html");
    exit;
}

// create the chatroom xml file handler
$xmlh = new xmlHandler("chatroom.xml");
if (!$xmlh->fileExist()) {
    header("Location: error.html");
    exit;
}

//clear the cookie after logout
setcookie("name","");
$xmlh->openFile();
$users = $xmlh->getElement("users");
$childNodeList =$users->childNodes;


//while ($childNodeList->count()>0){
//	$child = $childNodeList->item(0);
//	$xmlh->removeElement($users, $child);
//}
//$xmlh->saveFile();

//$messages = $xmlh->getElement("messages");
//$childNodeList =$messages->childNodes;
//sizeof($childNodeList)
//while ($childNodeList->count()>0){
//	$child = $childNodeList->item(0);
//	$xmlh->removeElement($messages , $child);
//}

//$xmlh->saveFile();



echo "<script>window.parent.location.reload()</script>"
?>
