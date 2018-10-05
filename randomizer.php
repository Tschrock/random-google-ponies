<?php

require './config.php';

//
//  googleponies.cyberpon3.net/randomizer.php?redirect=1&ehost=1&time=0&pics=all
//
//
//   Get options
//

$redirect = 1;
$ehost = 1;
$time = 0;

$error = 0;
$errormsg = "";

if (isset($_GET["redirect"])) {
    if ($_GET["redirect"] == 0 || $_GET["redirect"] == 1) {
        $redirect = intval($_GET["redirect"]);
    } else {
        ++$error;
        $errormsg += "Incorrect 'redirect' value!\n";
    }
}

if (isset($_GET["ehost"])) {
    if ($_GET["ehost"] == 0 || $_GET["ehost"] == 1) {
        if ($_GET["ehost"] == 1 && $redirect == 0) {
            ++$error;
            $errormsg += "Can't have ehost without redirect!\n";
            $ehost = 0;
        } else {
            $ehost = intval($_GET["ehost"]);
        }
    } else {
        ++$error;
        $errormsg += "Incorrect 'ehost' value!\n";
    }
}

if (isset($_GET["time"])) {
    if (is_numeric($_GET["time"])) {
        $time = intval($_GET["time"]);
    } else {
        ++$error;
        $errormsg += "Incorrect 'time' value!\n";
    }
}


$pics = (isset($_GET["pics"])) ? $_GET["pics"] : "ALL";
$picsArr = array();

if ($pics != "ALL") {
    $tmparr = explode(",", $pics);
    foreach ($tmparr as $pic) {
        if (is_numeric($pic)) {
            $picsArr[] = intval($pic);
        } else {
            ++$error;
            $errormsg += "Incorrect 'pics' value!\n";
        }
    }
}


//
//   Get pics
//

$sql = "SELECT * FROM logos l WHERE approved >= 1";
if (count($picsArr) > 0) {
    $sql .= " AND l.id IN ( " . implode(", ", $picsArr) . " )";
}

//var_dump($sql);




$mysqlkv = new mysqli($dbserver, $dbuser, $dbpass, $dbname);
if ($mysqlkv->connect_error) {
    die('Connect Error (' . $mysqlkv->connect_errno . ') '
            . $mysqlkv->connect_error);
}

$logos = mysqli_query($mysqlkv, $sql);

// Drop-in replacement for mysqli_result::fetch_all
for ($res = array(); $tmp = $logos->fetch_assoc();)
    $res[] = $tmp;

$logoArr = $res;

if ($time <= 0) {
    $row = $logoArr[array_rand($logoArr)];
} else {
    $row = $logoArr[(floor(time()/$time) % count($logoArr))];
}

function getMime($file) {
    global $extList;
    $ext = pathinfo($file, PATHINFO_EXTENSION);
    return isset($extList[strtolower($ext)]) ? $extList[strtolower($ext)] : "image/png";
}

if ($redirect == 1) {
    $redirectURL = $row["hostedUrl"];
    if ($ehost == 0) {
        $redirectURL = "hosted/" . $row["localFile"];
    }
    header("HTTP/1.1 303 See Other");
    header("Content-type: " . getMime($redirectURL));
    header('Location: ' . $redirectURL);
} else {

    $img = "hosted/" . $row["localFile"];

    if ($img != null) {
        header('Content-type: ' . getMime($img));
        readfile($img);
    } else {
        if (function_exists('imagecreate')) {
            header("Content-type: image/png");
            $im = @imagecreate(100, 100)
                    or die("Cannot initialize new GD image stream");
            $background_color = imagecolorallocate($im, 255, 255, 255);
            $text_color = imagecolorallocate($im, 0, 0, 0);
            imagestring($im, 2, 5, 5, "IMAGE ERROR", $text_color);
            imagepng($im);
            imagedestroy($im);
        }
    }
}
    