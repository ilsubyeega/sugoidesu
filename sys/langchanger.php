<?php
if (isset($_GET['lang'])) {
    if ($_GET['lang'] == "en_us" || $_GET['lang'] == "ko_kr"){

        setcookie("lang", $_GET['lang'], time() + (86400 * 30), "/");

    } else {

        // if Lang is not available
        echo '<script type="text/javascript">';
        echo 'alert("That language is not available.")';
        echo '<script>';

    }
} else {
    if(!isset($_COOKIE["lang"])) {
        setcookie("lang", "en_us", time() + (86400 * 30), "/");
    } else {
        echo 'Already Changed to en_us!';
    }
}
?>