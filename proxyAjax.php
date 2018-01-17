<?php
// proxyAjax.php
// ... validation of params
// and checking of url against whitelist would happen here ...
// assume that $url now contains "http://stackoverflow.com/10m"
$url = "";
if (isset($_GET["url"]))
    $url = (string)(htmlspecialchars($_GET["url"]));
if ($url != "") {
    $url = $url . rawurldecode("%26key%3Da22e5578a2dc");
    echo file_get_contents($url);
}
