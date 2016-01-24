<?php
$actions = $_GET['b'];
$id = intval($actions);
if(isset($id)){
$connectdb = mysql_connect('localhost','root','pass')or die("Could not connect to the server");
$selectadb = mysql_select_db("king") or die("The database could not be found!");

$req_query = mysql_query("SELECT `u_id` FROM `user` WHERE `u_db`='$id'") or die(mysql_error());
while($kkkk31 = mysql_fetch_array($req_query, MYSQL_ASSOC)){
	$fro3m3 = $kkkk31['u_id'];
	}
echo '<META HTTP-EQUIV="Refresh" CONTENT="0;URL=http://ts.i4nb.com/profile.php?id='.$fro3m3.'">  ';
} else {
echo "áã ÊÎÊÑ ÔíÁ";
}
?>