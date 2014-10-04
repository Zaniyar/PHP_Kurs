<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" xmlns="http://www.w3.org/1999/html"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/normalize.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <p>Das Passwort ist "test" ohne " " </p>


            <form enctype="multipart/form-data" action="uploader.php" method="POST">
                <p class="file">
                    <input name="userfile" id="userfile" type="file" required />
                    <label for="userfile">Screenshot</label>
                </p>
                <p class="slider">
                    <input name="slider" id="slider" type ="range" min ="0" max="10" step ="2" required />
                    <label for="slider">Prio</label>
                </p>
                <p class="option">
                    <select name="bugtype" id="bugtype" required >
                        <option>Fatal Error</option>
                        <option>XY Exception</option>
                        <option>IO Exception</option>
                    </select>
                    <label for="bugtype">Bugtype</label>
                </p>
                <p class="checkbox">
                    <input type="checkbox" name="rueckruf" id="rueckruf" value="rueckruf" />
                    <label for="rueckruf">R&uuml;ckruf gew&uuml;nscht</label>
                </p>
                <p class="radio">
                    <input type="radio" id="reproduzierbar_ja" name="reproduzierbar" value="Fehler ist reproduzierbar" required />
                    <label for="reproduzierbar_ja">reproduzierbar</label>
                    <p/>
                    <input type="radio" id="reproduzierbar_nein" name="reproduzierbar" value="Fehler ist NICHT reproduzierbar" required />
                    <label for="reproduzierbar_nein">nicht reproduzierbar</label>
                </p>
                <p class="datum">
                    <input name="datum" id="datum" type="date" value="11.01.2014" required />
                    <label for="datum">Datum</label>
                </p>
                <p class="passwort">
                    <input name="password" id="password" type="password" required />
                    <label for="password">Passwort</label>
                </p>
                <p class="mail">
                    <input name="mail" id="mail" type="email" required />
                    <label for="mail">E-Mail</label>
                </p>
                <p class="url">
                    <input name="url" id="url" type="url" required />
                    <label for="url">Website</label>
                </p>


                <p class="captcha">
                    <?php
                        require_once('recaptcha-php-1.11/recaptchalib.php');
                        $publickey = "6LesW_sSAAAAAMM9gUm-xsggThagwGzoDeCNHi-G"; // you got this from the signup page
                        echo recaptcha_get_html($publickey);
                     ?>

                </p>




                <input type="submit" value="Hochladen">

            </form>


        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.1.min.js"><\/script>')</script>

        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>




    </body>
</html>
