<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>Random Google Ponies</title>
    
        <meta name="description" content="A customisable userstyle that ponifies the google logo with random ponies.">
        <meta name="robots" content="index, follow">
        <meta name="author" content="CyberPon3">

        <meta property="og:type" content="website">
        <meta property="og:title" content="Random Google Ponies">
        <meta property="og:site_name" content="Random Google Ponies">
        <meta property="og:url" content="https://googleponies.cyberpon3.net/">
        <meta property="og:image" content="https://googleponies.cyberpon3.net/randompony.png">
        <meta property="og:description" content="A customisable userstyle that ponifies the google logo with random ponies.">
        <meta property="article:author" content="https://cyberpon3.deviantart.com">

        <meta name="twitter:card" content="summary" />
        <meta name="twitter:site" content="@CyberPon3" />
        <meta name="twitter:title" content="Random Google Ponies" />
        <meta name="twitter:description" content="A customisable userstyle that ponifies the google logo with random ponies." />
        <meta name="twitter:image" content="https://googleponies.cyberpon3.net/randompony.png" />
        <meta name="twitter:image:alt" content="A TinyFace" />

        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
            ga('create', 'UA-' + '51948041' + '-3', 'auto');
            ga('send', 'pageview');
        </script>

        <style>
            body {
                background-color: lightblue;
                text-align: center;
            }

            .glogo {
                max-width: 360px;
                max-height: 140px;
                clear: both;
                display: block;
                margin-left: auto;
                margin-right: auto;
            }

            .logoBlock {
                display: inline-block;
                margin: 20px;
                background-color: #fff;
                padding: 20px;
            }

            .logoBlock h3 {
                margin-top: 10px;
            }

            .links {
                margin-top: -15px;
                margin-right: 5px;
                margin-bottom: 20px;
            }

            .left {
                float: left;
            }
            .right {
                float: right;
            }
            .clear {
                clear: both;
            }

            #randomizer {
                margin: 20px;
                padding: 20px;
                background-color: lightgrey;
                text-align: left;
            }

            #randomizer h2{
                margin-top: 5px;
                text-align: center;
            }

            #randLeft {
                display: inline-block;
                text-align: center;
                margin: 20px 50px;
            }

            #randRight {
                margin-top: 20px;
                display: inline-block;
                border-left-width: 1px;
                text-align: left;
            }

            #randRightRight {
                display: inline-block;
                border-left-width: 1px;
                text-align: right;
                margin-right: 20px;
            }

            #randRightRight img {
                width: 400px;
            }

            .ihatecss{
                margin: 20px;
            }

            input:disabled + label {
                color: #ccc;
            }

            .lightbox {
                position:fixed;
                top:0;
                left:0;
                width:100%;
                height:100%;
                background:rgba(0, 0, 0, .8);
                display: flex;
                z-index: 1000;
                visibility:visible;
                opacity:1;
                transition-delay:0s;
            }

            .lightbox[hidden] {
                /*display: none;*/
                visibility:hidden;
                opacity:0;
                transition:visibility 0s linear 0.5s,opacity 0.5s linear;
            }

            .lightboxContent {
                text-align: left;
                width: 80%;
                height: 80%;
                background-color: white;
                margin: auto;
                padding: 20px;
            }

            #output {
                box-sizing: border-box;
                width: 100%;
                height: 50%;
                resize: none;
            }

            #outTemplate, #outMozTemplate {
                display: none;
            }

        </style>
        
        <script>
            function $id(x) {
                return document.getElementById(x);
            }
            function escapeRegExp(str) {
                return str.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&");
            }

            function generate() {
                pny = document.getElementById("randForm").elements.namedItem("pny[]");
                ponies = [];
                allPny = true;

                for (i = 0; i < pny.length; ++i) {
                    if (pny[i].checked) {
                        ponies.push(pny[i].value);
                    }
                    else {
                        allPny = false;
                    }
                }

                redirect = $id("redirect").checked ? 1 : 0;
                ehost = $id("ehost").checked ? 1 : 0;
                pics = allPny ? "ALL" : ponies.join(",");

                url = encodeURI("https://googleponies.cyberpon3.net/randomizer.php?version=0.2&redirect=" + redirect + "&ehost=" + ehost + "&pics=" + pics);

                $id("output").value = $id("outTemplate").value.replace(new RegExp(escapeRegExp("<<||LOGOURL||>>"), 'g'), url);
                
                if(!$id("forchrome").checked) {
                    $id("output").value = $id("outMozTemplate").value + " {\n" + $id("output").value + "\n}";
                }
                
                $id("popup").style.display = "flex";

                $id("popup").removeAttribute("hidden");

            }

            function checkRedirect() {
                redirect = $id("redirect");
                ehost = $id("ehost");

                if (!redirect.checked) {
                    ehost.checked = false;
                    ehost.disabled = true;
                } else {
                    ehost.disabled = false;
                }

            }

            function init() {
                $id("popup").addEventListener("click", onLBClick);
            }

            function onLBClick(e) {
                if (e.target == $id('popup'))
                    $id('popup').setAttribute('hidden', 'hidden');
            }
        </script>
    </head>
    <body>
        <form id="randForm" action="echo.php" method="post">
            <div id="randomizer">
                <div id="randLeft">
                    <h2>Google Pony Randomizer for Stylish</h2>
                    <div class="links" style="margin-bottom: 0px;">by <a href="https://cyberpon3.net">CyberPon3</a></div><br /><br />
                    Get the <a href="https://userstyles.org/styles/117858/random-google-ponies">pre-made style</a><br />
                    or<br />
                    customize your own:
                </div>
                <div id="randRight">
                    <div class="left ihatecss">
                        <input id="redirect" type="checkbox" name="redirect" value="redirect" onchange="checkRedirect()"/><label for="redirect">Use redirect</label><br />
                        <input id="ehost" type="checkbox" name="ehost" value="ehost" disabled /><label for="ehost">Use external host</label><br />
                        <input id="forchrome" type="checkbox" name="forchrome" value="forchrome" /><label for="forchrome">Use Google Chrome format</label><br /><br />
                    </div>
                    <div class="right">
                        <label for="time">Time between changes (s): </label><br /><input id="time" type="number" name="time" value="0" /><br /><br />
                        <input type="button" value="Generate!" onclick="generate();"/>
                    </div>
                </div>
                <div id="randRightRight" class="right">
                    <img src="randompony.png" />
                </div>
                <div class="clear"></div>
            </div>
            <?php
            require './config.php';
            // Database connection.

            $mysqlkv = new mysqli($dbserver, $dbuser, $dbpass, $dbname);
            if ($mysqlkv->connect_error) {
                die('Connect Error (' . $mysqlkv->connect_errno . ') '
                        . $mysqlkv->connect_error);
            }
            
            $approved_level = isset($_GET['approvedLevel']) && is_numeric($_GET['approvedLevel']) ? intval($_GET['approvedLevel']) : 1;
            
            $logos = mysqli_query($mysqlkv, "SELECT * FROM logos WHERE approved >= $approved_level");

            while ($field = $logos->fetch_assoc()) {
                echo "<span class=\"logoBlock\">"
                . "<h3>"
                . "<input id=\"pnyImg" . $field["id"] . "\" type=\"checkbox\" name=\"pny[]\" value=\"" . $field["id"] . "\" checked /><label for=\"pnyImg" . $field["id"] . "\">"
                . $field["title"] . "</label></h3>"
                . "<div class=\"links left\"> by <a href=\"" . $field["artistlink"] . "\">" . $field["artist"] . "</a></div>&nbsp;"
                . "&nbsp;<div class=\"links right\"> (<a href=\"" . $field["source"] . "\">Source</a>)" . (empty($field["stylishlink"]) ? "" : "(<a href=\"" . $field["stylishlink"] . "\">Stylish</a>)") . "</div>"
                . "<img class=\"glogo\" src=\"hosted/" . $field["localFile"] . "\" />"
                . "</span>";
            }
            ?>
        </form>
        <span>Website by CyberPon3 (<a href="mailto:cyber@cyberpon3.net">cyber@cyberpon3.net</a>)</span>
        <div id="popup" class="lightbox" hidden>
            <div class="lightboxContent">
                <h3>1. Install plugin</h3>
                In order to be able to add a logo, you must have a browser plugin allowing to add custom user styles for websites.<br>
                For ex. <b>Stylus</b>. You can find it for the following browsers:<br>
                <ul>
                    <li><b>Google Chrome</b><span> -&nbsp;<a class="external" href="https://chrome.google.com/webstore/detail/clngdbkpkpeebahjckkjfobafhncgmne">https://chrome.google.com/webstore/detail/clngdbkpkpeebahjckkjfobafhncgmne</a></span></li>
                    <li><b>Mozilla Firefox</b><span> -&nbsp;<a class="external" href="https://addons.mozilla.org/firefox/addon/styl-us/">https://addons.mozilla.org/firefox/addon/styl-us/</a></span></li>
                    <li><b>Opera </b><span>-&nbsp;</span><span><a class="external" href="https://addons.opera.com/extensions/details/stylus">https://addons.opera.com/extensions/details/stylus</a></span></li>
                </ul>
		<b>Warning: There's an older plugin called "Stylish" that's known to track users and steal their information, avoid it at all costs.</b>
                <h3><b>2. Add style</b></h3>
                <textarea id="output" readonly="readonly">
                </textarea>
            </div>
        </div>
        <textarea id="outMozTemplate">
@-moz-document domain("google.co.uk"), domain("google.com.ng"), domain("google.as"), domain("google.ca"), domain("google.es"), domain("google.de"), domain("google.com.au"), domain("google.fr"), domain("google.it"), domain("google.co.jp"), domain("google.ru"), domain("google.com.ar"), domain("google.com.sg"), domain("google.co.cr"), domain("google.com.tw"), domain("google.com.tr"), domain("google.at"), domain("google.ba"), domain("google.com.br"), domain("google.bs"), domain("google.ch"), domain("google.cz"), domain("google.dk"), domain("google.com.eg"), domain("google.fi"), domain("google.com.hk"), domain("google.hr"), domain("google.gr"), domain("google.ie"), domain("google.co.id"), domain("google.co.in"), domain("google.co.il"), domain("google.co.kr"), domain("google.com.lb"), domain("google.com.mx"), domain("google.nl"), domain("google.no"), domain("google.co.nz"), domain("google.com.ph"), domain("google.pt"), domain("google.se"), domain("google.so"), domain("google.co.th"), domain("google.com.ua"), domain("google.co.ve"), domain("google.com.vn"), domain("google.com.gt"), domain("google.com.ec"), domain("google.be"), domain("google.cn"), domain("google.com.cu"), domain("google.pl"), domain("google.sk"), domain("google.cl"), domain("google.com"), domain("google.kz"), domain("google.si"), domain("google.ae")
        </textarea>
        <textarea id="outTemplate">
/**
 * Randomized Google Pony Logos
 * 
 * Stylesheet and randomization service by CyberPon3
 * Art by ssumppg, ThePatrollPL, ViperDash, and Owl-Parchment
 *
 * https://googleponies.cyberpon3.net/
 * https://userstyles.org/styles/117858/random-google-ponies
 */

/**
 * Large logo on google homepage
 */

/* Hide the original logo */
#hplogo {
    display: none;
}

/* Add a new one */
#lga:before {
    content: '';
    display: block;
    height: 200px;
    width: 500px;
    margin-top: 100px;
    background-repeat: no-repeat;
    background-image: url('<<||LOGOURL||>>');
    background-size: contain;
    background-position: center center;
}



/**
 * Small logo on search results page
 */

/* Hide the original logo */
#logo img {
    display: none;
}

/* Add a new one */
.logocont #logo,
.logo #logo {
    overflow: visible;
}
.logocont #logo,
.logo #logo {
    content: '';
    display: block;
    height: 70px;
    width: 130px;
    margin-top: -15px;
    background-repeat: no-repeat;
    background-image: url('<<||LOGOURL||>>');
    background-size: contain;
    background-position: center center;
}



/**
 * Small logo on search settings page
 */

/* Replace the original logo */
.sfbgg #logo {
    height: 50px !important;
    width: 130px !important;
    top: 8px;
    background-image: url('<<||LOGOURL||>>') !important;
    background-size: contain;
    background-position: center center !important;
}



/**
 * Small logo on google translate page
 */

/* Hide the original logo */
#gbq1.gb_ac.gb_R.gb_ec .gb_me.gb_dc .gb_Wa.gb_fc {
    display: none;
}

/* Add a new one */
#gbq1.gb_ac.gb_R.gb_ec {
    overflow: visible;
}
#gbq1.gb_ac.gb_R.gb_ec .gb_me.gb_dc:before {
    content: '';
    display: block;
    height: 70px;
    width: 130px;
    margin-top: -8px;
    background-repeat: no-repeat;
    background-image: url('<<||LOGOURL||>>');
    background-size: contain;
    background-position: center center;
}



/**
 * Large logo on google books homepage
 */
#oc-search-image-box {
    padding-top: 20px;
}
#oc-search-image {
    height: 200px;
    width: 500px;
    background-image: url('<<||LOGOURL||>>') !important;
    background-size: contain;
    background-position: center center;
}
#oc-search-logo {
    left: 155px;
    top: 150px;
    font-size: 20px;
}
        </textarea>
        <script>
            init();
        </script>
    </body>
</html>
