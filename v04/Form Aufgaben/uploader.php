<?php
/**
 * Created by PhpStorm.
 * User: Zaniyar
 * Date: 02.10.2014
 * Time: 13:22
 */
header("refresh:2;index.php");  //10 sind die sek

require_once('recaptcha-php-1.11/recaptchalib.php');
$privatekey = "6LesW_sSAAAAAPNiS7RWRdz-JJ8YNb7-BrldQGPA";
$resp = recaptcha_check_answer ($privatekey,
    $_SERVER["REMOTE_ADDR"],
    $_POST["recaptcha_challenge_field"],
    $_POST["recaptcha_response_field"]);

if (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly
    die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
        "(reCAPTCHA said: " . $resp->error . ")");
} else {
    // Your code here to handle a successful verification


            // Das Formular wurde gesendet
            $uploaddir = 'uploads/';
            $uploadfile = $uploaddir . basename($_FILES["userfile"]["name"]);
            print "<pre>";
            if (move_uploaded_file($_FILES["userfile"]["tmp_name"], $uploadfile)) {
                print "File is valid, and was successfully uploaded.";
                print "<br>Sie werden gleich weitergeleitet.";
              //  print "Here’s some more debugging info:\n";
            //    print_r($_FILES);
            } else {
                print "Possible file upload attack! Here’s some debugging info:\n";
            //    print_r($_FILES);
            }
            print "</pre>";

    $slider = htmlspecialchars ($_POST["slider"]);
    $bugtype =htmlspecialchars ( $_POST["bugtype"]);
    $rueckruf = htmlspecialchars ($_POST["rueckruf"]);
    if($rueckruf ==""){
        $rueckruf = "keinen Rueckuf";
    }
    $reproduzierbar = htmlspecialchars ($_POST["reproduzierbar"]);
    $datum = htmlspecialchars ($_POST["datum"]);
    $date=date_create_from_format("d.m.Y",$datum);
    $passwort = htmlspecialchars ($_POST["password"]);
    $mail = htmlspecialchars ($_POST["mail"]);
    $url = htmlspecialchars ($_POST["url"]);


    echo "<br><br><br><br>rückruf ".$rueckruf;
    echo "<br><br><br><br>prio ".$slider;

    $fehler =0;
    if(!($slider >=1 && $slider<=10)){
        echo "Komische Werte für Prio";
        $fehler++;

    }
    if($bugtype != "Fatal Error" && $bugtype != "XY Exception" && $bugtype != "IO Exception" ) {
        echo "Von wo kommt dieser Wert?<br><br>";
        $fehler++;
    }
    if($rueckruf !="rueckruf" || $rueckruf !="keinen Rueckruf"){
        echo "Mit Rueckruf stimmt was nicht.<br><br>";
        $fehler++;

    }
    if( $reproduzierbar !="Fehler ist reproduzierbar" || $reproduzierbar !="Fehler ist NICHT reproduzierbar"){
        echo "Entweder ist der Fehler reproduzierbar oder nicht, aber nichts dazwischen<br><br>";
        $fehler++;
    }
    if(!(checkdate(date("m", $date),date("d", $date),date("Y", $date))) || new DateTime()< $date){
        echo"Das Datum ist komisch oder du kannst in die Zukunft sehen<br><br>";
        $fehler++;
    }
    if($passwort !="test"){
        echo "passwort ist falsch<br><br>";
        $fehler++;
    }
    if(!(filter_var($mail, FILTER_VALIDATE_EMAIL))){
        echo "Komische EMail Adresse!<br><br>";
        $fehler++;
    }
    if(!filter_var($url, FILTER_VALIDATE_URL)){
        echo "Komische URL<br><br>";
        $fehler++;
    }

    $gesamtText= "Die Prio ist: ".$slider." <br> Der Bugtype ist ".$bugtype." <br> Der Kunde wuenscht ".$rueckruf." <br> Der Fehler ist".$reproduzierbar." <br> Das Datum des Auftretens: ".$date." <br> seine Mailadresse ist ".$mail." <br> seine Url ist ". $url;
    $gesamtText= str_replace("<br>", "\n", $gesamtText);

if($fehler>0){

}else {
    // schreib:

    $myfile = fopen("uploads/logs/" . time() . ".txt", "w") or die("Unable to open file!");
    fwrite($myfile, $gesamtText);
    fclose($myfile);

    include "advancedMail.php";
}
}
         ?>