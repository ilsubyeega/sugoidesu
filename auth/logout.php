<?php
#
#
# SugoiDesu! (https://github.com/ilsubyeega/sugoidesu)
# This File is Licensed as GNU Affero General Public License v3.0
# Find out more: https://github.com/ilsubyeega/sugoidesu/blob/master/LICENSE
#
#
#

// We are going to cache it for 7 weeks.
ini_set("session.name", "sugoidesu_session");   // Cookie name
ini_set("session.cache_expire", 10080);   // Min
ini_set("session.gc_maxlifetime", 604800);  // Sec

// Start session
session_start();
if (isset($_SESSION['userid']) && isset($_SESSION['username'])) {
	session_destroy();
}
header('Location: '.'http://' . $_SERVER['HTTP_HOST']);
?>