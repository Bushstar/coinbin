<?php
// proxyAjax.php
// ... validation of params
// and checking of url against whitelist would happen here ...
// assume that $url now contains "http://stackoverflow.com/10m"
$url = htmlspecialchars($_GET["url"]);
echo file_get_contents($url);