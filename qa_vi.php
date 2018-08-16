<?php
$sql = "select * from qa_title a , qa_select b where a.q_t_seq = b.q_s_qa and q_t_seq = '".$_GET["list"]."'";
$ro = mysqli_query($link,$sql);
$rrr = mysqli_fetch_assoc($ro);

if(!empty($_POST["ya"])){
  $sql = "insert into qa_log value(null,'".$_GET["list"]."','".$_POST["ya"]."','".$_SESSION["player"]."')";
  mysqli_query($link,$sql);
  ?><script>document.location.href="/?do=que";</script><?php
}
?>
<form method="post">
<fieldset id="left_list">
  <legend>目前位置：首頁 > 問卷調查 > <?=$rrr["q_t_title"]?></legend>
    <table width="98%" border="1" align="center" cellpadding="3" cellspacing="0">
      <tr>
        <td align="left"><?=$rrr["q_t_title"]?></td>
      </tr>
<?php do{?>
      <tr>
        <td align="left"><input type="radio" name = "ya" value="<?=$rrr["q_s_seq"]?>"><?=$rrr["q_s_con"]?></td>
      </tr>
<?php }while($rrr = mysqli_fetch_assoc($ro));?>
      <tr>
        <td align="center"><input type="submit" value = "我要投票"></td>
      </tr>
    </table>
</fieldset>
</form>