<?php
  if(!empty($_POST["my_id"])){
    $sql = "select * from q2_member where q_m_id = '".$_POST["my_id"]."' ";
    $ro = mysqli_query($link,$sql);
    $id_totle = mysqli_num_rows($ro);

    $sql = "select * from q2_member where q_m_id = '".$_POST["my_id"]."' and q_m_pw = '".$_POST["my_pw1"]."'";
    $ro = mysqli_query($link,$sql);
    $cc = mysqli_fetch_assoc($ro);
    $totle = mysqli_num_rows($ro);
    $error = 1;
    if($id_totle == 0){ $error = "查無帳號";}
    if($error == 1){
      if($totle == 0){
        $error = "密碼錯誤";
      }else{
        $_SESSION["player"] =$_POST["my_id"];
        ?><script>document.location.href='/'</script><?php  
      }    
    }
    if($error != 1){ ?><script>alert("<?=$error?>");</script><?php }
  }
?>
<form method="post">
<table width="500" border="0" align="center" cellpadding="3" cellspacing="1">
  <tr>
    <td align="left" valign="middle">帳號</td>
    <td align="left" valign="middle"><input name="my_id"></td>
  </tr>
  <tr>
    <td align="left" valign="middle">密碼</td>
    <td align="left" valign="middle"><input type="password" name="my_pw1"></td>
  </tr>
  <tr>
    <td>
      <input type="submit" value="登入">
      <input type="reset" value="清除">
    </td>
    <td>
<a href="?do=check">忘記密碼</a> | <a href="?do=add_login">尚未註冊</a>
    </td>
  </tr>
</table>
</form>