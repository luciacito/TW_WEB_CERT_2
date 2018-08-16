<?php
  $now_mune1="index";
  if(!empty($_GET["do"])){
    $now_mune1=$_GET["do"];
  }
  $now_mune2="a1";
  if(!empty($_GET["list2"])){
    $now_mune2=$_GET["list2"];
  }
?>
<style>
  #doula{
    height:50px;
    margin: 10PX 0PX;
  }

</style>
<div id="doula">目前位置：<?=$web_map_list[$now_mune1].$web_map_list[$now_mune1.$now_mune2]?></div>
