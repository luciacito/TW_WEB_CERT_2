<?php
session_start();
$link = mysqli_connect("localhost","root","","db00_q2");
mysqli_query($link,"set names utf8");
  $sql = "select * from article where a_look = 1 and a_seq = '".$_POST["news_list"]."'";
  $ro = mysqli_query($link,$sql);
  $rr = mysqli_fetch_assoc($ro);
  echo nl2br($rr["a_cont"]);
?>