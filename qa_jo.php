<?php
$sql = "select * from qa_log where q_l_qt = '".$_GET["list"]."'";
$ro = mysqli_query($link,$sql);
$vi_totle = mysqli_num_rows($ro);

$sql = "select * from qa_title a , qa_select b where a.q_t_seq = b.q_s_qa and q_t_seq = '".$_GET["list"]."'";
$ro = mysqli_query($link,$sql);
$rrr = mysqli_fetch_assoc($ro);

?>
<fieldset id="left_list">
  <legend>目前位置：首頁 > 問卷調查 > <?=$rrr["q_t_title"]?></legend>
    <table width="98%" border="1" align="center" cellpadding="3" cellspacing="0">
      <tr>
        <td colspan="2" align="left"><?=$rrr["q_t_title"]?></td>
      </tr>
<?php
do{
$sql = "select * from qa_log where q_l_select = '".$rrr["q_s_seq"]."'";
$ror = mysqli_query($link,$sql);
$rrrr = mysqli_num_rows($ror);
$vi_now = round(($rrrr / $vi_totle) * 10000)/100;
$vi_width = $vi_now * 3;
?>
      <tr>
        <td align="left" width="50%"><?=$rrr["q_s_con"]?> </td>
        <td align="left"><div style="width:<?=$vi_width?>px;height:15px;background-color:#fbadea;display:inline-block;"></div><?=$rrrr?>票(<?=$vi_now?>%)</td>
      </tr>
<?php }while($rrr = mysqli_fetch_assoc($ro));?>
      <tr>
        <td colspan="2" align="center"><input type="button" value = "返回" onclick = "document.location.href='/?do=que';"></td>
      </tr>
    </table>
</fieldset>