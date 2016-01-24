<?php
$req_query = mysql_query("SELECT `from` FROM `frin_req` WHERE `to`='$client_db'");

while($req_query = mysql_fetch_array($req_query)){
	$from = $req_query['from'];
	$get_query = mysql_query("SELECT `u_name` FROM `user` WHERE `u_db`='$from'");
	
	while($get_query = mysql_fetch_array($get_query)){
		$u_name = $req_query['u_name'];
		echo "<a href='profile/".$from."' class='box' style='display:block'>".$u_name."</a>";
	}
}
?>