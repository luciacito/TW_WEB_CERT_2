<?php
  if(!empty($_POST["q_name"])){
    $sql = "insert into qa_title value(null,'".$_POST["q_name"]."')";
    mysqli_query($link,$sql);
    $sql = "select * from qa_title order by q_t_seq desc limit 1";
    $ro = mysqli_query($link,$sql);
    $rr = mysqli_fetch_assoc($ro);
    $rrr = $rr["q_t_seq"];
    if(!empty($_POST["q_select"][0])){
      for($p = 0 ; $p < count($_POST["q_select"]);$p++){
        $sql = "insert into qa_select value(null,'".$rrr."','".$_POST["q_select"][$p]."')";
        mysqli_query($link,$sql);
      }
    }
  }
?>
<form method="post">
<table width="90%" border="1" align="center" cellpadding="3" cellspacing="0">
  <tr>
    <td width="23%">問卷名稱</td>
    <td width="77%">
      <input name="q_name" />
    </td>
  </tr>
  <tr>
    <td colspan="2">
      <sn id="ooo">選項<input name='q_select[]'/></sn>
      <input type="button" value="更多" onclick="add_select()"/>
    </td>
  </tr>
  <tr>
    <td colspan="2">
      <input type="submit" value="新增" />
      <input type="reset" value="清空" />
    </td>
  </tr>
</table>
</form>
<script>
  var bbb = "<br>選項<input name='q_select[]'/>";
  function add_select(){
    document.getElementById("ooo").innerHTML = document.getElementById("ooo").innerHTML + bbb;
  }
</script>