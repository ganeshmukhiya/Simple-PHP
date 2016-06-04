/* connecting php file with localhost database and down below is a login-form which checks the username and password in the database that have access to the data contained in the database */
<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'username'); //provide name of your localhost database. i had simply written username as my database name
define('DB_USER','root'); // provide type of user. its simply 'root' in my case
define('DB_PASSWORD',''); // provide password(if any).Generally i donot keep password so it is empty

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error()); //checking username and password
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

function login()
{
session_start();   //starting the session for user profile page
$error="empty";
if(!empty($_POST['user']) &&  !empty($_POST['pass']))   //checking the 'user' name which is from Sign-In.html, is it empty or have some text
{
	$query = mysql_query(" SELECT *  FROM userids where Id = '$_POST[user]' AND Password = '$_POST[pass]'")
  or
  die(mysql_error());
     	$row = mysql_fetch_array($query) or die(mysql_error());
}
else{
echo "Username or Password ".$error;
}

	if(!empty($row['Id']) AND !empty($row['Password']))
	{
		$_SESSION['Id'] = $row['Password'];
      //header('LOCATION:index.php');
	//echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE..." ;
	echo "Welcome";
  header('Location:check2.php'); //directing to
}
	else{

	}

}



    if(isset($_POST['submit']))
    {
				login();

				 }





?>
