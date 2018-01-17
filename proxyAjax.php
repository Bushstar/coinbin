<?php

header("Access-Control-Allow-Origin: https://wallet.ufocoin.net/");
header('Content-Type: application/json');

require "include/jsonRPCClient.php";

// Daemon
$servername = "127.0.0.1";
$daemonuser = "uforpc";
$daemonpass = "7MNYJKkb7xKF3YZg3u5sA6FA3XxLj9MWYnje5hw52dVH";
$port = "9888";

$wallet = new jsonRPCClient('http://' . $daemonuser . ':' . $daemonpass . '@' . $servername . ':' . $port . '/');

$url = "";
if (!empty($_GET) && isset($_GET["url"]))
    $url = (string)htmlspecialchars($_GET["url"]);
if ($url != "") {
    $url = $url . rawurldecode("%26key%3Da22e5578a2dc");
    echo file_get_contents($url);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST) && !empty($_GET) && isset($_POST["rawtx"], $_GET["module"], $_GET["key"]) && $_GET["module"] == "sendrawtransaction" && $_GET["key"] == "32098462904584238923572") {
    $sendrawtransaction = (string)htmlspecialchars($_POST["rawtx"]);

    try {
        var_dump($wallet->sendrawtransaction($sendrawtransaction));
    } catch (Exception $e) {
        echo 0;
    }
}
