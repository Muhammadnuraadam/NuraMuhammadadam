<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "assignment";
//session_start();
$db=mysqli_connect($host, $user, $pass) or die("Could not connect to database server");
mysqli_select_db($db,$dbname) or die ("Could not connect to database name");

$thisFile = str_replace('\\', '/', __FILE__);
$docRoot = $_SERVER['DOCUMENT_ROOT'];
$webRoot  = str_replace(array($docRoot, 'dbconnect.php'), '', $thisFile);
$srvRoot  = str_replace('dbconnect.php', '', $thisFile);

define('WEB_ROOT', $webRoot);
define('SRV_ROOT', $srvRoot);
define('PRODUCT_IMAGE_DIR',  'employer_images/');
define('LIMIT_PRODUCT_WIDTH',     true);
define('MAX_PRODUCT_IMAGE_WIDTH', 180);
define('THUMBNAIL_WIDTH',         180);
if (!get_magic_quotes_gpc())
{
	if (isset($_POST))
	{
		foreach ($_POST as $key => $value)
		{
			$_POST[$key] =  trim(addslashes($value));
		}
	}
	if (isset($_GET))
	{
		foreach ($_GET as $key => $value)
		{
			$_GET[$key] = trim(addslashes($value));
		}
	}
}
?>
