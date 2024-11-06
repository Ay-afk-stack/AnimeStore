<?php
session_start();
session_unset();
session_destroy();
echo"<script>alert('Logged Out')</script>";
echo"<script>window.open('user_login.php','_self')</script>";
?>