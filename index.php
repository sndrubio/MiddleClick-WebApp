<?php
ob_start();
include ('include/common.php');
$pageTitle = 'Index';
mydoctype();
printPageHeader($pageTitle);
$html = '<h1>Welcome to</h1>';
$html .= '<p align="left" style="margin-left:20px; padding-left: 20px; font-size:20px; "><img src="content/img/midclik.jpg">&nbsp;&nbsp;&nbsp;We manage your files.</p>';
mybody($html);

echo '

<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
	<tr>
		<form name="checkform" method="POST" action="check_login.php">
			<td>
				<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
					<tr>
						<td colspan="3"><strong>Member Login </strong></td>
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
						<td>Company:</td>
						<td><input  name="mycompany" type="text" id="mycompany"></td>
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




myfooter();
ob_end_flush();
?>


