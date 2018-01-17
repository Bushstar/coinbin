<?php
require "include/jsonRPCClient.php";

// Daemon
$servername = "127.0.0.1";
$daemonuser = "uforpc";
$daemonpass = "7MNYJKkb7xKF3YZg3u5sA6FA3XxLj9MWYnje5hw52dVH";
$port = "9888";

$wallet = new jsonRPCClient('http://' . $daemonuser . ':' . $daemonpass . '@' . $servername . ':' . $port . '/');

// echo var_dump($wallet->getinfo());

$url = "";
if (!empty($_GET) && isset($_GET["url"]))
    $url = (string)htmlspecialchars($_GET["url"]);
if ($url != "") {
    $url = $url . rawurldecode("%26key%3Da22e5578a2dc");
    echo file_get_contents($url);
}

//$sendrawtransaction = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST) && !empty($_GET) && isset($_POST["rawtx"], $_GET["module"], $_GET["key"]) && $_GET["module"] == "sendrawtransaction" && $_GET["key"] == "32098462904584238923572") {
    $sendrawtransaction = (string)htmlspecialchars($_POST["rawtx"]);

    var_dump($wallet->sendrawtransaction($sendrawtransaction));
}