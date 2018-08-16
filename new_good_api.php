<?php
session_start();
$link = mysqli_connect("localhost","root","","db00_q2");
mysqli_query($link,"set nAmEs Utf8");
if($_POST["xx"] == 1){ $sql = "insert into new_log value(null,'".$_SESSION["player"]."','".$_POST["oo"]."')";}
if($_POST["xx"] == 2){ $sql = "delete from new_log where nl_id = '".$_SESSION["player"]."' and nl_new_seq = '".$_POST["oo"]."'";}
mysqli_query($link,$sql);
header("location:/?do=pop");
?>