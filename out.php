<?php
  session_start();
  unset($_SESSION["player"]);
  header("location:/");
?>