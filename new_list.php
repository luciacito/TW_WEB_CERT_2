<?php
  $now_page = 1;
  $page_cnt = 3;
  if(!empty($_GET["page"])){ $now_page = $_GET["page"]; }
  $limit_start = ($now_page - 1 ) * $page_cnt;//計算LIMIT起始數
  $sql = "select * from article where a_look = 1";
  $ro = mysqli_query($link,$sql);
  $data_totle = mysqli_num_rows($ro);//撈出資料總筆數
  $sql = "select * from article where a_look = 1 limit $limit_start,$page_cnt";
  $ro = mysqli_query($link,$sql);
  $rr = mysqli_fetch_assoc($ro);
  $page_totle = ceil($data_totle/$page_cnt);//計算總頁數
  
  $left_arrow ="";
  $right_arrow ="";
  $l_a = $now_page - 1;
  $r_a = $now_page + 1;
  if($now_page != 1){ $left_arrow = "<a href='?do=news&page=".$l_a."'><</a>";}
  if($now_page < $page_totle){ $right_arrow = "<a href='?do=news&page=".$r_a."'>></a>";}
?>
  <fieldset id="left_list">
    <legend>目前位置：首頁 > 最新文章區</legend>
    <table width="90%" border="0" align="center" cellpadding="10" cellspacing="5">
      <tr>
        <td align="center" width="50%">標題</td>
        <td align="center">內容</td>
      </tr>
<?php do{?>
  <tr>
    <td align="left" onclick="document.location.href='?do=news_look&read=<?=$rr["a_seq"]?>'" style="background-color:#f0f0f0;"><?=$rr["a_title"]?></td>
    <td align="left" onclick="document.location.href='?do=news_look&read=<?=$rr["a_seq"]?>'"><?=mb_substr($rr["a_cont"],0,15,"utf-8")?>...</td>
  </tr>
<?php }while($rr = mysqli_fetch_assoc($ro));?>
      <tr>
        <td colspan="2" align="left">
          <?=$left_arrow?>
<?php
  for($o=1;$o <= $page_totle;$o++){
    if( $now_page == $o){
      echo " <span style='font-size:20px;'>".$o."</span> ";    
    }else{
      echo " ".$o." ";    
    }
  }
?>
          <?=$right_arrow?>
        </td>
      </tr>
    </table>
  </fieldset>