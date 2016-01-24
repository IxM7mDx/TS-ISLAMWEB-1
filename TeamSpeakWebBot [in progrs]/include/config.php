<?php 
/* page title */
$title = "i4nB teamspeak ";

/* activation*/
$config["activation_group"] = "42";
$config["activation_notid"] = "9";
$config["activation_roomi"] = "42";
/* random function */
include 'rand.php';

/* the server config */
$config["USER_QUERY"] = "serveradmin";
$config["PASS_QUERY"] = "pass";
$config["HOST_QUERY"] = "localhost";
$config["PORT_QUERY"] = "10011";
$config["SERVER_PORT"] = "9987";
$config["channel_admin"] = "Channel Admin";
$config["web_url_http"] = "http://51.254.222.182/teamspeak-new/";
$config["cpt_url_http"] = "1";
$config["domain"] = "";

/* the pages */
$config["NICK_QUERY"] = "WEB BOT[".$rand."]";
$config["NICK_QUERY2"] = "WEB BOT[".$rand2."]";
$config["NICK_QUERY_activated"] = "Activation BOT[".$rand."]";
$config["NICK_QUERY_clans"] = "clans BOT[".$rand."]";
$config["NICK_QUERY_admin"] = "serveradmin BOT[".$rand2."]";
$config["icon_file_path"] = "/server/icons";

/* server get games */
$SID_GROUP = "301";

/* ranks */
$SID_GROUP_ranks = array(71); //SORT_ID del grupo que sera listado Example array(1,2,3,4,5)
include 'rank.php';

?>