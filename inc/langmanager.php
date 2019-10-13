<?php
    if(!isset($_COOKIE["lang"])) {
        setcookie("lang", "en_us", time() + (86400 * 30), "/");
        $currlang = "en_us";

    } else {
        if ($_COOKIE["lang"] == "en_us" || $_COOKIE["lang"] == "ko_kr"){
            // Add More Time
            setcookie("lang", $_COOKIE["lang"], time() + (86400 * 30), "/");
            $currlang = $_COOKIE["lang"];
        } else {
            // Filter Wrong Lang
            setcookie("lang", "en_us", time() + (86400 * 30), "/");
            $currlang = "en_us";
        }
    }

    // Set Language
    global $lang;
    $lang = json_decode(file_get_contents("C:\Users\ilsub\Documents\Projects\sugoidesu\inc\lang/".$currlang.".json"), true);