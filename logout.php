<?php
session_start();
include("includes/config.php");
$_SESSION['login']=="";
date_default_timezone_set('America/New_York');
// Write code for log out from the session

?>
<script language="javascript">
document.location="index.php";
</script>
