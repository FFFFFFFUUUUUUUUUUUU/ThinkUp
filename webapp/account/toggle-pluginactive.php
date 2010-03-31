<?php
chdir("..");
require_once ('config.webapp.inc.php');
ini_set("include_path", ini_get("include_path").PATH_SEPARATOR.$INCLUDE_PATH);
require_once ("init.php");

session_start();
$session = new Session();
if (!$session->isLoggedIn()) {
    header("Location: ../index.php");
}

$pid = $_GET["pid"];
$a = $_GET["a"];
if ($a != 1) {
	$a = 0;
}

$pd = new PluginDAO($db);

$pd->setActive($pid, $a);

$db->closeConnection($conn);	
?>