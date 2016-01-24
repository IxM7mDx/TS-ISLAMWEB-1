<?php

include 'include/get.php';
$clan134 = 3;
$clan13 = 3;
$clan1343 = 3;
$clan1344 = 3;
$clan1345 = 3;
$clan1346 = 3;
$clan1347 = 3;
$clan1348 = 3;
$clan1349 = 3;
$rs = mysql_query("SELECT * FROM clantocreated", $connect_panel);
		$rows = array();
		while($row = mysql_fetch_array($rs)) {
		$rows[] = $row;
		  }
		$max = count($rows) - 1;
		$odek13 = $rows[rand(0, $max)][1];
		
		$query114325243 = mysql_query("SELECT * FROM clantocreated WHERE `id_room`=$odek13", $connect_panel) or die(mysql_error());
		while($row542321236 = mysql_fetch_array($query114325243, MYSQL_ASSOC)) {
		$clan13 = $row542321236['is_sele'];
		}
		if($clan13 == "1"){
		$rs = mysql_query("SELECT * FROM clantocreated", $connect_panel);
		$rows = array();
		while($row = mysql_fetch_array($rs)) {
		$rows[] = $row;
		  }
		$max = count($rows) - 1;
		$odek13 = $rows[rand(0, $max)][1];
		$query114325243 = mysql_query("SELECT * FROM clantocreated WHERE `id_room`=$odek13", $connect_panel) or die(mysql_error());
			while($row542321236 = mysql_fetch_array($query114325243, MYSQL_ASSOC)) {
			$clan134 = $row542321236['is_sele'];
			}
		}
		if($clan134 == "1"){
		$rs = mysql_query("SELECT * FROM clantocreated", $connect_panel);
		$rows = array();
			while($row = mysql_fetch_array($rs)) {
			$rows[] = $row;
			}
		$max = count($rows) - 1;
		$odek13 = $rows[rand(0, $max)][1];
		$query114325243 = mysql_query("SELECT * FROM clantocreated WHERE `id_room`=$odek13", $connect_panel) or die(mysql_error());
			while($row542321236 = mysql_fetch_array($query114325243, MYSQL_ASSOC)) {
			$clan1344 = $row542321236['is_sele'];
			}
		}
		if($clan1344 == "1"){
		$rs = mysql_query("SELECT * FROM clantocreated", $connect_panel);
		$rows = array();
			while($row = mysql_fetch_array($rs)) {
			$rows[] = $row;
			}
		$max = count($rows) - 1;
		$odek13 = $rows[rand(0, $max)][1];
		$query114325243 = mysql_query("SELECT * FROM clantocreated WHERE `id_room`=$odek13", $connect_panel) or die(mysql_error());
			while($row542321236 = mysql_fetch_array($query114325243, MYSQL_ASSOC)) {
			$clan1345 = $row542321236['is_sele'];
			}
		}
		if($clan1345 == "1"){
		$rs = mysql_query("SELECT * FROM clantocreated", $connect_panel);
		$rows = array();
			while($row = mysql_fetch_array($rs)) {
			$rows[] = $row;
			}
		$max = count($rows) - 1;
		$odek13 = $rows[rand(0, $max)][1];
		$query114325243 = mysql_query("SELECT * FROM clantocreated WHERE `id_room`=$odek13", $connect_panel) or die(mysql_error());
			while($row542321236 = mysql_fetch_array($query114325243, MYSQL_ASSOC)) {
			$clan1346 = $row542321236['is_sele'];
			}
		}
		if($clan1346 == "1"){
		$rs = mysql_query("SELECT * FROM clantocreated", $connect_panel);
		$rows = array();
			while($row = mysql_fetch_array($rs)) {
			$rows[] = $row;
			}
		$max = count($rows) - 1;
		$odek13 = $rows[rand(0, $max)][1];
		$query114325243 = mysql_query("SELECT * FROM clantocreated WHERE `id_room`=$odek13", $connect_panel) or die(mysql_error());
			while($row542321236 = mysql_fetch_array($query114325243, MYSQL_ASSOC)) {
			$clan1347 = $row542321236['is_sele'];
			}
		}
		if($clan1347 == "1"){
		$rs = mysql_query("SELECT * FROM clantocreated", $connect_panel);
		$rows = array();
			while($row = mysql_fetch_array($rs)) {
			$rows[] = $row;
			}
		$max = count($rows) - 1;
		$odek13 = $rows[rand(0, $max)][1];
		$query114325243 = mysql_query("SELECT * FROM clantocreated WHERE `id_room`=$odek13", $connect_panel) or die(mysql_error());
			while($row542321236 = mysql_fetch_array($query114325243, MYSQL_ASSOC)) {
			$clan1348 = $row542321236['is_sele'];
			}
		}
		if($clan1348 == "1"){
		$rs = mysql_query("SELECT * FROM clantocreated", $connect_panel);
		$rows = array();
			while($row = mysql_fetch_array($rs)) {
			$rows[] = $row;
			}
		$max = count($rows) - 1;
		$odek13 = $rows[rand(0, $max)][1];
		$query114325243 = mysql_query("SELECT * FROM clantocreated WHERE `id_room`=$odek13", $connect_panel) or die(mysql_error());
			while($row542321236 = mysql_fetch_array($query114325243, MYSQL_ASSOC)) {
			$clan1349 = $row542321236['is_sele'];
			}
		}
		if ($clan1349 == '1'){
		echo 'حظك زق';
		} else {
		echo $odek13;
		}
?>	