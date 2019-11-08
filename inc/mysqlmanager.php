<?php
#
#
# SugoiDesu! (https://github.com/ilsubyeega/sugoidesu)
# This File is Licensed as GNU Affero General Public License v3.0
# Find out more: https://github.com/ilsubyeega/sugoidesu/blob/master/LICENSE
#
#
#


$mysqli = new mysqli($config['mysql']['host'], $config['mysql']['id'], $config['mysql']['pw'], $config['mysql']['db']);
if ($mysqli->connect_errno) {
    die("Could not connect to MySQL Server: " + $mysqli->connect_error);
}

global $mysqli;

?>