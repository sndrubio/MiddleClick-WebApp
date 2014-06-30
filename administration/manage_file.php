<?php
ob_start();
include ('../include/common.php');
session_start();
$pageTitle = 'Admin Manage Files';
mydoctype();
printPageHeader($pageTitle);
$html = '<h1>Welcome to</h1>';
$html .= '<p align="left" style="margin-left:20px; padding-left: 20px; font-size:20px; "><img src="../content/img/midclik.jpg">&nbsp;&nbsp;&nbsp;We manage your files.</p>';
mybody($html);



    if(!isset($_SESSION['username'])){
         echo '<p style="margin-left:40px;">Hello, Admin! Please, select the field you are going to work in:</p>';
    }
    else {  
        header('location:admin.php');
		echo mysql_error ();
    }

	

print '<div style="margin-left:60px;">';

print '<form action="uploadfile.php" method="POST">'.PHP_EOL;
print '<label for company>Upload a file</label>&nbsp'.PHP_EOL;
print '<input type="submit" class="btn btn-primary" value="Select"/>'.PHP_EOL;
print '</form>'.PHP_EOL;


print '<form action="savetext.php" method="POST">'.PHP_EOL;
print '<label for company>Save text</label>&nbsp&nbsp&nbsp&nbsp&nbsp'.PHP_EOL;
print '<input type="submit" class="btn btn-primary" value="Select"/>'.PHP_EOL;
print '</form>'.PHP_EOL;


print '<form action="uploadcsv.php" method="POST">'.PHP_EOL;
print '<label for company>Upload CSV</label>&nbsp&nbsp'.PHP_EOL;
print '<input type="submit" class="btn btn-primary" value="Select"/>'.PHP_EOL;
print '</form>'.PHP_EOL;

print '<p align="center"><a href="admin_logout.php"><button type="submit" class="btn btn-default">Logout</button></a></p>';

print '</div>';










	
	
	
	
	


myfooter();
ob_end_flush();
?>