<?php

session_start();
$dbconn;
function dbConnection(){
    global $dbconn;
    $dbconn = mysqli_connect("localhost","root", '', 'accuralab');
    if(!$dbconn){
        die("Lidhja me databazen nuk u realizua! " . mysqli_error($dbconn));
    }
}

dbConnection();

// Funksioni per login
function login($emaili,$fjalekalimi){
    global $dbconn;
    $sql = "SELECT doktoriid, emri, mbiemri, emaili, fjalekalimi, statusi FROM doktoret";
    $sql.= " WHERE emaili='$emaili' AND fjalekalimi='$fjalekalimi'";
    $res = mysqli_query($dbconn, $sql);
    if (mysqli_num_rows($res) == 1) {
        $doktori=array();
        $doktoriData=mysqli_fetch_assoc($res);
        $doktori['doktoriid']=$doktoriData['doktoriid'];
        $doktori['emrimbiemri']=$doktoriData['emri'] . " " . $doktoriData['mbiemri'];
        $doktori['emaili']=$doktoriData['emaili'];
        $doktori['fjalekalimi']=$doktoriData['fjalekalimi'];
        $doktori['statusi']=$doktoriData['statusi'];
        $_SESSION['doktori']=$doktori;
        header("Location: index.php");
    }else{
    echo "Nuk ka perdorues me keto shenime!";
    }
}

if(isset($_GET['argument'])){
    if($_GET['argument']=='dalja'){
        session_destroy();
        echo "index.php";
    }
}

// Funksionet per doktoret
function merrDoktoret(){
    global $dbconn;
    // $sql = "SELECT doktoriid, emri, mbiemri, gjinia, shteti, komuna, adresa, emaili, fjalekalimi, telefoni, statusi FROM doktoret";
    $sql = "SELECT * FROM doktoret";
    $res = mysqli_query($dbconn, $sql);
    if(mysqli_num_rows($res) > 0){
        return $res;
    }else{
        echo "Nuk ka doktor te regjistruar!";
    }
}
function shtoDoktor($emri, $mbiemri, $gjinia, $shteti, $komuna, $adresa, $emaili, $fjalekalimi, $telefoni){
    global $dbconn;
    $sql = "INSERT INTO doktoret (emri, mbiemri, gjinia, shteti, komuna, adresa, emaili, fjalekalimi, telefoni) ";
    $sql.= "VALUES ('$emri', '$mbiemri', '$gjinia', '$shteti', '$komuna', '$adresa', '$emaili', '$fjalekalimi', '$telefoni')";
    $res = mysqli_query($dbconn, $sql);
    if ($res) {
        header("Location: index.php");
    } else {
        echo "Shtimi i doktorit deshtoi!"  . mysqli_error($dbconn);
    }
}
function merrDoktoriId($doktoriid)
{
    global $dbconn;
    $sql = "SELECT doktoriid, emri, mbiemri, gjinia, shteti, komuna, adresa, emaili, fjalekalimi, telefoni, statusi  FROM doktoret";
    $sql .= " WHERE doktoriid=$doktoriid";
    $res = mysqli_query($dbconn, $sql);
    $doktori = mysqli_fetch_assoc($res);
    return $doktori;
}
function modifikoDoktor($doktoriid, $emri, $mbiemri, $gjinia, $shteti, $komuna, $adresa, $emaili, $fjalekalimi, $telefoni)
{
    global $dbconn;
    $sql = "UPDATE doktoret  SET emri='$emri', mbiemri='$mbiemri', gjinia='$gjinia', shteti='$shteti',";
    $sql .= " komuna='$komuna', adresa='$adresa', emaili='$emaili', fjalekalimi='$fjalekalimi', telefoni='$telefoni' ";
    $sql .= " WHERE doktoriid=$doktoriid";
    $res = mysqli_query($dbconn, $sql);
    if ($res) {
        header("Location: doktoret.php");
    } else {
        echo "Modifikimi i doktorit deshtoi!"  . mysqli_error($dbconn);
    }
}
function fshijDoktor($doktoriid)
{
    global $dbconn;
    $sql = "DELETE FROM  doktoret WHERE doktoriid=$doktoriid";
    $res = mysqli_query($dbconn, $sql);
    if ($res) {
        header("Location: doktoret.php");
    } else {
        echo "Fshirja e doktorit deshtoi!"  . mysqli_error($dbconn);
    }
}
function merrKontrollatDoktori(){
    global $dbconn;
    $doktoriid=$_SESSION['doktori']['doktoriid'];
    $sql = "SELECT k.kontrollaid, p.emri as pacientiemri, d.emri as doktoriemri, k.analizat, k.rezultatet, k.dataekontrolles, k.dataerezultatit, k.epaguar ";
    $sql.= "FROM pacientet p INNER JOIN kontrollat k ON p.pacientiid=k.pacientiid"; 
    $sql.= " INNER JOIN doktoret d ON k.doktoriid=d.doktoriid WHERE d.doktoriid=$doktoriid";
    $res = mysqli_query($dbconn, $sql);
    if (mysqli_num_rows($res) > 0) {
        return $res;
    } else {
        echo "Nuk ka shenime";
    }
}
// Funksionet per pacientet
function merrPacientet(){
    global $dbconn;
    // $sql = "SELECT pacientiid, emri, mbiemri, gjinia, emaili, fjalekalimi, shteti, komuna, telefoni, grupiigjakut FROM pacientet";
    $sql = "SELECT * FROM pacientet";
    $res = mysqli_query($dbconn, $sql);
    if(mysqli_num_rows($res) > 0){
        return $res;
    }else{
        echo "Nuk ka pacient te regjistruar!";
    }
}
function shtoPacient($emri, $mbiemri, $gjinia, $emaili, $fjalekalimi, $shteti, $komuna, $telefoni, $grupiigjakut){
    global $dbconn;
    $sql = "INSERT INTO pacientet (emri, mbiemri, gjinia, emaili, fjalekalimi, shteti, komuna, telefoni, grupiigjakut) ";
    $sql.= "VALUES ('$emri', '$mbiemri', '$gjinia', '$emaili', '$fjalekalimi', '$shteti', '$komuna', '$telefoni', '$grupiigjakut')";
    $res = mysqli_query($dbconn, $sql);
    if ($res) {
        header("Location: pacientet.php");
    } else {
        echo "Shtimi i pacientit deshtoi!"  . mysqli_error($dbconn);
    }
}
function merrPacientiId($pacientiid)
{
    global $dbconn;
    $sql = "SELECT pacientiid, emri, mbiemri, gjinia, emaili, fjalekalimi, shteti, komuna, telefoni, grupiigjakut  FROM pacientet";
    $sql .= " WHERE pacientiid=$pacientiid";
    $res = mysqli_query($dbconn, $sql);
    $pacienti = mysqli_fetch_assoc($res);
    return $pacienti;
}
function modifikoPacient($pacientiid, $emri, $mbiemri, $gjinia, $emaili, $fjalekalimi, $shteti, $komuna, $telefoni, $grupiigjakut)
{
    global $dbconn;
    $sql = "UPDATE pacientet  SET emri='$emri', mbiemri='$mbiemri', gjinia='$gjinia', emaili='$emaili', fjalekalimi='$fjalekalimi',";
    $sql .= "  shteti='$shteti', komuna='$komuna', telefoni='$telefoni', grupiigjakut='$grupiigjakut' ";
    $sql .= " WHERE pacientiid=$pacientiid";
    $res = mysqli_query($dbconn, $sql);
    if ($res) {
        header("Location: pacientet.php");
    } else {
        echo "Modifikimi i pacientit deshtoi!"  . mysqli_error($dbconn);
    }
}
function fshijPacient($pacientiid)
{
    global $dbconn;
    $sql = "DELETE FROM  pacientet WHERE pacientiid=$pacientiid";
    $res = mysqli_query($dbconn, $sql);
    if ($res) {
        header("Location: pacientet.php");
    } else {
        echo "Fshirja e pacientit deshtoi!"  . mysqli_error($dbconn);
    }
}
function regjistroPacient($emri, $mbiemri, $gjinia, $emaili, $fjalekalimi, $shteti, $komuna, $telefoni, $grupiigjakut)
{
    global $dbconn;
    $sql = "INSERT INTO pacientet (emri,mbiemri,gjinia,emaili,fjalekalimi,shteti,komuna,telefoni,grupiigjakut) VALUES ";
    $sql .= "('$emri','$mbiemri','$gjinia','$emaili','$fjalekalimi','$shteti','$komuna','$telefoni','$grupiigjakut')";
    $res = mysqli_query($dbconn, $sql);
    if ($res) {
        header("Location: index.php");
    } else {
        echo "Regjistrimi i pacientit deshtoi!"  . mysqli_error($dbconn);
    }
}
// Funksionet per kontrollat
function merrKontrollat(){
    global $dbconn;
    $sql = "SELECT kontrollaid, p.emri as pacientiemri, d.emri as doktoriemri, analizat, rezultatet, dataekontrolles, dataerezultatit, epaguar ";
    $sql.= "FROM pacientet p INNER JOIN kontrollat k ON p.pacientiid=k.pacientiid ";
    $sql.= "INNER JOIN doktoret d ON d.doktoriid=k.doktoriid";
    $res = mysqli_query($dbconn, $sql);
    if(mysqli_num_rows($res) > 0){
        return $res;
    }else{
        echo "Nuk ka kontrolla te bera!";
    }
}
function shtoKontroll($pacientiid ,$doktoriid, $analizat, $rezultatet, $dataekontrolles, $dataerezultatit, $epaguar)
{
    global $dbconn;
    $sql = "INSERT INTO kontrollat (pacientiid, doktoriid, analizat, rezultatet, dataekontrolles, dataerezultatit, epaguar) VALUES "; 
    $sql.= "('$pacientiid', '$doktoriid','$analizat','$rezultatet','$dataekontrolles','$dataerezultatit',$epaguar)";
    $res = mysqli_query($dbconn, $sql);
    if ($res) {
        header("Location: profilidoktor.php");
    } else {
        echo "Shtimi i kontrolles deshtoi!"  . mysqli_error($dbconn);
    }
}
function merrKontrollaId($kontrollaid)
{
    global $dbconn;
    $sql = "SELECT kontrollaid, p.pacientiid, d.doktoriid, p.emri as pacientiemri, p.mbiemri as pacientimbiemri, "; 
    $sql.= "d.emri as doktoriemri, d.mbiemri as doktorimbiemri, analizat, rezultatet, "; 
    $sql.= "dataekontrolles, dataerezultatit, epaguar FROM pacientet p INNER JOIN kontrollat k ON p.pacientiid=k.pacientiid ";
    $sql.= "INNER JOIN doktoret d ON k.doktoriid=d.doktoriid WHERE kontrollaid=$kontrollaid";
    $res = mysqli_query($dbconn, $sql);
    $kontrolla = mysqli_fetch_assoc($res);
    return $kontrolla;
}
function modifikoKontroll($kontrollaid, $analizat, $rezultatet, $dataekontrolles, $dataerezultatit, $epaguar)
{
    global $dbconn;
    $sql = "UPDATE kontrollat  SET analizat='$analizat', rezultatet='$rezultatet',";
    $sql .= " dataekontrolles='$dataekontrolles', dataerezultatit='$dataerezultatit', epaguar=$epaguar";
    $sql .= " WHERE kontrollaid=$kontrollaid";
    $res = mysqli_query($dbconn, $sql);
    if ($res) {
        header("Location: profilidoktor.php");
    } else {
        echo "Modifikimi i kontrolles deshtoi!"  . mysqli_error($dbconn);
    }
}
function fshijKontroll($kontrollaid)
{
    global $dbconn;
    $sql = "DELETE FROM  kontrollat WHERE kontrollaid=$kontrollaid";
    $res = mysqli_query($dbconn, $sql);
    if ($res) {
        header("Location: profilidoktor.php");
    } else {
        echo "Fshirja e kontrolles deshtoi!"  . mysqli_error($dbconn);
    }
}

// Pjesa e FAQs
function merrFaqs(){
    global $dbconn;
    $sql = "SELECT p.faqid, d.doktoriid, d.emri as emridoktori, d.mbiemri as mbiemridoktori, p.pyetja, p.pergjigja";
    $sql.= " FROM pyetjet p INNER JOIN doktoret d ON p.doktoriid=d.doktoriid";
    $res = mysqli_query($dbconn, $sql);
    if(mysqli_num_rows($res) > 0){
        return $res;
    }else{
        echo "Nuk ka pyetje te regjistruara!";
    }
}
function shtoFaq($doktoriid, $pyetja, $pergjigja){
    global $dbconn;
    $sql = "INSERT INTO pyetjet (doktoriid, pyetja, pergjigja) ";
    $sql.= "VALUES ('$doktoriid', '$pyetja', '$pergjigja')";
    $res = mysqli_query($dbconn, $sql);
    if ($res) {
        header("Location: faq.php");
    } else {
        echo "Shtimi i pyetjes deshtoi!"  . mysqli_error($dbconn);
    }
}
function merrFaqId($faqid)
{
    global $dbconn;
    $sql = "SELECT p.faqid, d.doktoriid, d.emri as emridoktori, d.mbiemri as mbiemridoktori, p.pyetja, p.pergjigja";
    $sql.=" FROM pyetjet p INNER JOIN doktoret d ON p.doktoriid=d.doktoriid";
    $sql .= " WHERE faqid=$faqid";
    $res = mysqli_query($dbconn, $sql);
    $faq = mysqli_fetch_assoc($res);
    return $faq;
}
function modifikoFaq($faqid, $doktoriid, $pyetja, $pergjigja)
{
    global $dbconn;
    $sql = "UPDATE pyetjet  SET doktoriid='$doktoriid', pyetja='$pyetja', pergjigja='$pergjigja'";
    $sql .= " WHERE faqid=$faqid";
    $res = mysqli_query($dbconn, $sql);
    if ($res) {
        header("Location: faq.php");
    } else {
        echo "Modifikimi i pyetjes deshtoi!"  . mysqli_error($dbconn);
    }
}
function fshijFaq($faqid)
{
    global $dbconn;
    $sql = "DELETE FROM  pyetjet WHERE faqid=$faqid";
    $res = mysqli_query($dbconn, $sql);
    if ($res) {
        header("Location: faq.php");
    } else {
        echo "Fshirja e pyetjes deshtoi!"  . mysqli_error($dbconn);
    }
}
?>
