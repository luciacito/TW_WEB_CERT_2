<?php
 $link = mysqli_connect("localhost","root","","db00_q2");
 mysqli_query($link,"set names uft8");

 if(isset($_POST["my_id"])){
  $error = 1;
  if(empty($_POST["my_id"])){
    $error = "不可以空白";
    ?><script>alert("<?=$error?>");</script><?php
  }
  if($error == 1){
    $sql = "select * from q2_member where q_m_id ='".$_POST["my_id"]."'";
    $ro = mysqli_query($link,$sql);
    $totle = mysqli_num_rows($ro);
    if($totle > 0){
      $error = "帳號重複";
      ?><script>alert("<?=$error?>");</script><?php
    }
  }
  if($error == 1){
    if($_POST["my_pw1"] != $_POST["my_pw2"]){
      $error = "密碼不相同";
      ?><script>alert("<?=$error?>");</script><?php
    }
  }
  if($error == 1){
    $sql = "insert into q2_member value(null,'".$_POST["my_id"]."','".$_POST["my_pw1"]."','".$_POST["my_mail"]."')";
    mysqli_query($link,$sql);
    ?><script>alert("註冊完成，歡迎加入");document.location.href="?do=add_login"</script><?php
  }
 }
?>
<fieldset>
  <legend>會員註冊</legend>
<form method="post">
<table width="600" border="0" align="center" cellpadding="3" cellspacing="1">
  <tr>
    <td colspan="2">*請設定您要註冊的帳號及密碼(最長12個字元)</td>
  </tr>
  <tr>
    <td align="left" valign="middle">Step1:登入帳號</td>
    <td align="left" valign="middle"><input name="my_id"></td>
  </tr>
  <tr>
    <td align="left" valign="middle">Step2:登入密碼</td>
    <td align="left" valign="middle"><input type="password" name="my_pw1"></td>
  </tr>
  <tr>
    <td align="left" valign="middle">Step3:再次確認密碼</td>
    <td align="left" valign="middle"><input type="password" name="my_pw2"></td>
  </tr>
  <tr>
    <td align="left" valign="middle">Step4:信箱(忘記密碼時使用)</td>
    <td align="left" valign="middle"><input name="my_mail"></td>
  </tr>
  <tr>
    <td colspan="2">
      <input type="submit" value="註冊">
      <input type="reset" value="清除">
    </td>
  </tr>
</table>
</form>
</fieldset>