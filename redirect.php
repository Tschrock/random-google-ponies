<?php

$possibilities = array(
"http://th05.deviantart.net/fs70/PRE/f/2014/111/3/5/maud_pie_google_logo__install_guide___by_thepatrollpl-d7ffy79.png",
"http://th05.deviantart.net/fs70/PRE/f/2014/165/f/1/fluffle_puff_google_logo__install_guide___by_thepatrollpl-d7m8n5a.png",
"http://fc00.deviantart.net/fs71/f/2014/171/3/f/coco_pommel_google_logo__install_guide___by_thepatrollpl-d7n7bec.png",
"http://orig13.deviantart.net/ef0e/f/2015/096/a/2/starlight_glimmer_google_logo__installation_guide__by_thepatrollpl-d8ooqhe.png",
"http://fc07.deviantart.net/fs71/f/2013/110/4/f/fluttershy_google_logo__install_guide___by_thepatrollpl-d62c7kr.png",
"http://fc08.deviantart.net/fs70/f/2013/111/d/6/applejack_google_logo__install_guide___by_thepatrollpl-d62gui3.png",
"http://fc00.deviantart.net/fs71/f/2013/114/c/6/rainbow_dash_google_logo__install_guide___by_thepatrollpl-d62tid1.png",
"http://fc02.deviantart.net/fs70/f/2013/119/0/9/pinkie_pie_google_logo__install_guide___by_thepatrollpl-d63hbxt.png",
"http://th01.deviantart.net/fs70/PRE/f/2013/122/d/8/twilight_sparkle_google_logo__install_guide___by_thepatrollpl-d63v3d2.png",
"http://fc05.deviantart.net/fs71/f/2013/123/2/3/rarity_google_logo__install_guide___by_thepatrollpl-d63y4af.png",
"http://th04.deviantart.net/fs70/PRE/f/2013/127/5/f/derpy_hooves_google_logo__install_guide___by_thepatrollpl-d64gq5z.png",
"http://th00.deviantart.net/fs71/PRE/f/2013/131/5/a/princess_luna_google_logo__install_guide___by_thepatrollpl-d64xb6j.png",
"http://th08.deviantart.net/fs71/PRE/f/2013/137/2/6/octavia_google_logo__install_guide___by_thepatrollpl-d65les6.png",
"http://i.imgur.com/sJUqzkx.png",
"http://i.imgur.com/CTVjdLd.png",
"http://i.imgur.com/gq7CZmo.png",
"http://i.imgur.com/Pesto3Y.png",
"http://i249.photobucket.com/albums/gg216/ssumppg/DJ-PON3-Google-Logo_sm_zpsc9aece71.png",
"http://i249.photobucket.com/albums/gg216/ssumppg/Doctor-Pie-Google-Logo_sm_zpsa760ee62.png",
"http://i249.photobucket.com/albums/gg216/ssumppg/Derpy-Google-Logo_sm_zpsec4d1dd6.png",
"https://mlpforums.com/uploads/monthly_04_2014/blogentry-18832-0-03230300-1396910128.png",
"http://fc03.deviantart.net/fs71/i/2013/275/8/e/princess_tierra_google_logo__install_guide___by_stormcloudmlp-d6oy2hi.png"
);

header("HTTP/1.1 303 See Other");
header("Content-type: image/png");
$picnumber = isset($_GET['img']) && is_numeric($_GET['img']) ? intval($_GET['img']) : rand(0, count($possibilities) - 1);
header('Location: ' . $possibilities[$picnumber]);
