<?php
  $now_page = 1;
  $page_cnt = 3;
  if(!empty($_GET["page"])){ $now_page = $_GET["page"]; }
  $limit_start = ($now_page - 1 ) * $page_cnt;//計算LIMIT起始數
  $sql = "select * from 0article";
  $ro = mysqli_query($link,$sql);
  $data_totle = mysqli_num_rows($ro);//撈出資料總筆數
  $sql = "select * from article limit $limit_start,$page_cnt";
  $ro = mysqli_query($link,$sql);
  $rr = mysqli_fetch_assoc($ro);
  $page_totle = ceil($data_totle/$page_cnt);//計算總頁數
  
  $left_arrow ="";
  $right_arrow ="";
  $l_a = $now_page - 1;
  $r_a = $now_page + 1;
  if($now_page != 1){ $left_arrow = "<a href='?do=admin_news&page=".$l_a."'><</a>";}
  if($now_page < $page_totle){ $right_arrow = "<a href='?do=admin_news&page=".$r_a."'>></a>";}
  if(!empty($_POST["id"][0])){
    if(!empty($_POST["del"][0])){
      for($kk=0;$kk < count($_POST["del"]);$kk++){
        $sql = "delete from article where a_seq = '".$_POST["del"][$kk]."'";
        mysqli_query($link,$sql);
      }
      ?><script>document.location.href="?do=admin_news"</script><?php
    }
    for($kk=0;$kk < count($_POST["id"]);$kk++){
        $sql = "update article set a_look = 0 where a_seq = '".$_POST["id"][$kk]."'";
        mysqli_query($link,$sql);
    }
    if(!empty($_POST["look"][0])){
      for($kk=0;$kk < count($_POST["look"]);$kk++){
        $sql = "update article set a_look = 1 where a_seq = '".$_POST["look"][$kk]."'";
        mysqli_query($link,$sql);
      }
      ?><script>document.location.href="?do=admin_news"</script><?php
    }
  }
?>
<form method="post">
<table width="90%" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr>
    <td align="center">編號</td>
    <td align="center">標題</td>
    <td align="center">顯示</td>
    <td align="center">刪除</td>
  </tr>
<?php do{?>
  <tr>
    <td align="center"><?=$rr["a_seq"]?></td>
    <td align="center"><?=$rr["a_title"]?></td>
    <td align="center">
      <input type = "checkbox" name="look[]" value="<?=$rr["a_seq"]?>" <?php if($rr["a_look"] == 1){ echo "checked";}?>>
      <input type = "hidden" name="id[]" value="<?=$rr["a_seq"]?>">
    </td>
    <td align="center"><input type = "checkbox" name="del[]" value="<?=$rr["a_seq"]?>"></td>
  </tr>
<?php }while($rr = mysqli_fetch_assoc($ro));?>
  <tr>
    <td align="right">
    <?=$left_arrow?>
    </td>
    <td colspan="2" align="center">
<?php
  for($o=1;$o <= $page_totle;$o++){
    if( $now_page == $o){
      echo " <span style='font-size:20px;'>".$o."</span> ";    
    }else{
      echo " ".$o." ";    
    }
  }
?>
    </td>
    <td align="left">
    <?=$right_arrow?>
    </td>
  </tr>
  <tr>
    <td colspan="4" align="center">
      <input type="submit" value="確定修改">
    </td>
  </tr>
</table>
</form>