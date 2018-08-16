<?php
session_start();
$link = mysqli_connect("localhost","root","","db00_q2");
mysqli_query($link,"set names utf8");

$today = strtotime("+6hour");
$now_today = date("Y-m-d",$today);
$now_month = date("m",$today);
$now_day = date("d",$today);
$now_week = date("l",$today);

if(empty($_SESSION["dd"])){
  $_SESSION["dd"] =$now_today;
  $sql = "select * from player where p_day = '".$now_today."'";
  $rr = mysqli_query($link,$sql);
  $totle = mysqli_num_rows($rr);
  if($totle == 0){//如果沒資料的話，以今天日期新增一筆資料
    $sql = "insert into player value(Null,1,'".$now_today."')";
  }else{//如果有資料的話，修改今天人數
    $sql = "update player set p_cnt = p_cnt + 1 where p_day = '".$now_today."'";  
  }
  mysqli_query($link,$sql);
}else{
  if( $_SESSION["dd"] != $now_today){//當SESSION中紀錄的日期與今天日期不相同時
    $_SESSION["dd"] =$now_today;
    $sql = "select * from player where p_day = '".$now_today."'";
    $rr = mysqli_query($link,$sql);
    $totle = mysqli_num_rows($rr);
    if($totle == 0){//如果沒資料的話，以今天日期新增一筆資料
      $sql = "insert into player value(Null,1,'".$now_today."')";
    }else{//如果有資料的話，修改今天人數
      $sql = "update player set p_cnt = p_cnt + 1 where p_day = '".$now_today."'";  
    }
    mysqli_query($link,$sql);
  }
}
  $sql="select p_cnt from player where p_day = '".$now_today."'";
  $rr = mysqli_query($link,$sql);
  $nn = mysqli_fetch_assoc($rr);
  $today_cnt = $nn["p_cnt"];
 
  $sql="select sum(p_cnt) from player";
  $rr = mysqli_query($link,$sql);
  $nn = mysqli_fetch_assoc($rr);
  $totle_cnt = $nn["sum(p_cnt)"];
include_once("web_list.php");
?>