<?php
// proxyAjax.php
// ... validation of params
// and checking of url against whitelist would happen here ...
// assume that $url now contains "http://stackoverflow.com/10m"
$url = "";
if (isset($_GET["url"]))
    $url = htmlspecialchars($_GET["url"]);
if ($url != "")
    echo file_get_contents($url);
