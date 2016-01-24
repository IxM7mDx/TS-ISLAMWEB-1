<?php

/*        ~[ Panel db config ]~         */
$connect1_to = "localhost";
$connect1_in = "root";
$connect1_wh = "pass";
$connect_panel = mysqli_connect($connect1_to,$connect1_in,$connect1_wh)or die("Could not connect to the server");
$select_panels = mysqli_select_db($connect_panel,'king') or die("The database could not be found!");

		
		
$connect2_to = "localhost";
$connect2_in = "root";
$connect2_wh = "pass";
$connect_rank = mysqli_connect($connect2_to,$connect2_in,$connect2_wh)or die("Could not connect to the server");
$select_ranks = mysqli_select_db($connect_rank,'ranko') or die ("Could not connect to the server2"); 

?>