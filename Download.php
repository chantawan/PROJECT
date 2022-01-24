<?php
if(isset($_GET["filename"]) and $_GET["filename"]!="filedownload") {
    $file = $_GET["filename"];
    $file = str_replace(" ","%20",$file);
    $len = filesize($file);
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Type: application/force-download");
    $header="Content-Disposition: attachment; filename=".basename($file).";";
    header($header );
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: ".$len);
    $file = "downloads/getfile.pdf";
    header("Cache-Control: public");
    header("Content-Type: application/pdf");
    header("Content-Description: File Transfer");
    header("Content-Transfer-Encoding: binary");
    header("Content-Disposition: attachment; filename=" . $file);
    header("Content-Length: " . filesize($file));
    readfile($file);
    @readfile($file);}
    exit;
?>