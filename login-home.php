<?PHP
require_once("./include/session_config.php");

if(!$dbsession->CheckLogin())
{
    $dbsession->RedirectToURL("login.php");
    exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Home page</title>
      <link rel="STYLESHEET" type="text/css" href="style/reg_login.css">
</head>
<body>
<div id='reg_login_content'>
<h2></h2>
 <?= $dbsession->UserFullName(); ?> is logged on.

<!-- <p><a href='change-pwd.php'>Change password</a></p> -->

<p><a href='access-controlled.php'>A sample 'members-only' page</a></p>
<br><br><br>
<p><a href='logout.php'>Logout</a></p>
</div>
</body>
</html>
