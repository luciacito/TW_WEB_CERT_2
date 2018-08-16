<?php
  $now = "";
  if(isset($_POST["my_search"])){
    $sql="select * from q2_member where q_m_mail = '".$_POST["my_search"]."' ";
    $ri = mysqli_query($link,$sql);
    $ro = mysqli_fetch_assoc($ri);
    $tot = mysqli_num_rows($ri);
    if($tot == 1){
      $now = "您的密碼為:".$ro["q_m_pw"];
    }elseif($tot == 0){
      $now = "查無此資料";
    }else{
      $now = "發生不明原因錯誤";
    } 
  }
?>
<style>
  #mysearch{
    width:300px;
    height:100px;
    margin:0 auto;
  }
</style>
<form method="post">
  <div id="mysearch">
  請輸入信箱以查詢密碼<br>
  <input name="my_search"><br>
  <span><?=$now?></span><br>
  <input type ="submit" value="尋找"><br><br>
</div>
</form>