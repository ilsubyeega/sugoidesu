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
    $userid = $mysqli->real_escape_string($_SESSION['userid']);
    $username = $mysqli->real_escape_string($_SESSION['username']);
    if (!$mysqli_result = $mysqli->query("SELECT * FROM `users` WHERE `username`='".$username."' AND `id`='".$userid."'")){
        die("SQL Error during verifing user.");
    }
    // If Value is set
    if ($mysqli_result->num_rows > 0){
        $session_exists = 1;
    } else {
        // Delete the session
        $session_exists = 0;
        session_destroy();
    }
} else {
    $session_exists = 0;
}



function session_navbar_top() {
    global $session_exists, $lang;
    if ($session_exists == 1){
        echo '
            <li class="nav-item dropdown">
            <a data-toggle="dropdown" class="nav-link has-dropdown" >
            <figure class="avatar mr-2 avatar-sm leu-avatar2">
                <img src="https://a.osu.leu.kr/'.$_SESSION['userid'].'" alt="Non-Avatar">
            </figure>
            <span class="leu-comfortaa">'.$_SESSION['username'].'</span></a>';
    } else {
        echo '
            <li class="nav-item dropdown">
            <a data-toggle="dropdown" class="nav-link has-dropdown" >
            <i class="fas fa-user"></i><span>'.$lang['modules']['navbar']['auth']['title'].'</span></a>';
    }
}

function session_navbar_inside() {
    global $session_exists, $lang;
    if ($session_exists == 1){
        echo '
        <div class="leu-mid-out leu-bg">
            <div class="container leu-mid-in">
                <figure class="avatar mr-2 avatar-xl leu-avatar1">
                    <img src="https://a.osu.leu.kr/'.$_SESSION['userid'].'" alt="Non-Avatar">
                </figure>
                <div class="leu-profile-text leu-comfortaa">'.$_SESSION['username'].'</div>
            </div>
        
            <a href="/user?u='.$_SESSION['userid'].'" class="btn leu-profile-button btn-icon icon-left">
            <i class="fas fa-exchange-alt"></i>&nbsp;Profile</a>
            <a href="#" class="btn leu-profile-button btn-icon icon-left">
            <i class="fas fa-exchange-alt"></i>&nbsp;Settings</a>
            <a href="/auth/logout" class="btn leu-profile-button btn-icon icon-left">
            <i class="fas fa-exchange-alt"></i>&nbsp;Logout</a>
        </div>';
    } else {
        echo '
        <li class="nav-item">
            <a href="/auth/login" class="nav-link">
            <i class="fas fa-sign-in-alt"></i>
            &nbsp; Login</a>
        </li>
        <li class="nav-item">
            <a href="/auth/register" class="nav-link">
            <i class="fas fa-user-plus"></i>
            &nbsp; '.$lang['modules']['navbar']['auth']['register'].'</a>
        </li>';


    }
}


?>