<?php
ob_start();
include ('../include/common.php');
$pageTitle = 'Admin Login';
mydoctype();
printPageHeader($pageTitle);
$html = '<h1>Welcome to</h1>';
$html .= '<p align="left" style="margin-left:20px; padding-left: 20px; font-size:20px; "><img src="../content/img/midclik.jpg">&nbsp;&nbsp;&nbsp;We manage your files.</p>';
mybody($html);

$host="buffalogrove.sat.iit.edu:3306"; // Host name 
$username="iituser"; // Mysql username 
$password="-8iituser!"; // Mysql password 
$db_name="middleclik"; // Database name 
$tbl_name="users"; // Table name 

mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// username and password sent from form 
$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword']; 

$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword' and company='middleclik'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername, $mypassword, table row must be 1 row
if($count==1){
 session_start();
$_SESSION ['username']=$row['username'];
$_SESSION ['password']=$row['password'];
 header ('location: manage_file.php');
 
}
else {
print '<p align="center" style="color:#FF0000; font-weight:bold"; ">Wrong Login</p>';
print '<p align="center">Please Login Again:</p>';
echo'
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
	<tr>
		<form name="checkform" method="post" action="admin_check_login.php">
			<td>
				<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
					<tr>
						<td colspan="3"><strong>Admin Login </strong></td>
					</tr>
					<tr>
						<td width="78">Username:</td>
						<td width="294"><input name="myusername" type="text" id="myusername"></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><input name="mypassword" type="password" id="mypassword"></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td><input type="submit" name="Submit" value="Login"></td>
					</tr>
				</table>
			</td>
		</form>
	</tr>
</table>

';



}










myfooter();
ob_end_flush();
?>
