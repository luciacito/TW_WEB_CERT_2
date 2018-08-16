<?php

  if(!empty($_GET["read"])){ $now_page = $_GET["read"]; 
    $sql = "select * from article where a_look = 1 and a_seq = '$now_page'";
    $ro = mysqli_query($link,$sql);
    $rr = mysqli_fetch_assoc($ro);
  }
  if(!empty($_SESSION["player"])){
    $sql = "select * from new_log where nl_id = '".$_SESSION["player"]."' and nl_new_seq = '$now_page'";
    $ro = mysqli_query($link,$sql);
    $xx = mysqli_num_rows($ro);
    if($xx == 0 ){
      $ww = "| <a href='javascript:good($now_page,1)'>讚</a>";
    }else{
      $ww = "| <a href='javascript:good($now_page,2)'>回收讚</a>";    
    }
  }
  ?>
  <fieldset id="left_list">
    <legend>目前位置：首頁 > 最新文章區</legend>
    <fieldset id="left_list">
      <legend>文章標題：<?=$rr["a_title"]?> <?=$ww;?></legend>
      <?=nl2br($rr["a_cont"])?>
    </fieldset>    
  </fieldset>
  
  <script>
    function good(oo,xx){
      $.post("new_good_api.php",{oo,xx},function(){
        document.location.href="?do=news_look&read=<?=$now_page?>";
      });
    }
  </script>