<?php
$sql = "select * from qa_title";
$ro = mysqli_query($link,$sql);
$rrr = mysqli_fetch_assoc($ro);
$login = "請先登入";
?>
<fieldset id="left_list">
  <legend>目前位置：首頁 > 問卷調查</legend>
    <table width="98%" border="1" align="center" cellpadding="3" cellspacing="0">
      <tr>
        <td align="center">編號</td>
        <td align="center">問卷題目</td>
        <td align="center">投票總數</td>
        <td align="center">結果</td>
        <td align="center">狀態</td>
      </tr>
<?php
do{
  if(!empty($_SESSION["player"])){$login = "<a href='?do=vi&list=".$rrr["q_t_seq"]."'>參與投票</a>";}
?>
      <tr>
        <td align="center"><?=$rrr["q_t_seq"]?></td>
        <td align="left"><?=$rrr["q_t_title"]?></td>
        <td align="center"></td>
        <td align="center"><a href='?do=jago&list=<?=$rrr["q_t_seq"]?>'>結果</a></td>
        <td align="center"><?=$login?></td>
      </tr>
<?php }while($rrr = mysqli_fetch_assoc($ro));?>
    </table>
</fieldset>
