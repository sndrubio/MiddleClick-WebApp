<?php
ob_start();
include ('../include/common.php');
$pageTitle = 'Upload File';
mydoctype();
printPageHeader($pageTitle);;
$html = '<h1>Welcome to</h1>';
$html .= '<p align="left" style="margin-left:20px; padding-left: 20px; font-size:20px; "><img src="../content/img/midclik.jpg">&nbsp;&nbsp;&nbsp;We manage your files.</p>';
mybody($html);

error_reporting(E_ALL ^ E_NOTICE);
	
session_start();	

print '<div style="margin-left:60px;">';
print '<h2>Upload a File</h2>'.PHP_EOL;
print '<br>';
print '<form action="uploadfile.php" method="POST"  enctype="multipart/form-data">'.PHP_EOL;
print '<label for company>Company</label>'.PHP_EOL;
print '<input name="mycompany" type="text" id="mycompany"/>'.PHP_EOL;
print '<label for company>Campaign Name</label>'.PHP_EOL; 
print '<input name="marketingCampaignName" type="text" id="marketingCampaignName"/>'.PHP_EOL;
print '<br><br>';
print '<label for picture>Please select a file</label>'.PHP_EOL;
print '<input type="file"  name="picture"/>'.PHP_EOL;
print '<input type="submit" value="Upload!"/>'.PHP_EOL;
print '</form>'.PHP_EOL;
print '</div>';


loadFile();

print '<p align="center"><a href="manage_file.php"><button type="submit" class="btn btn-default">Back</button></a>&nbsp;&nbsp;&nbsp;<a href="admin_logout.php"><button type="submit" class="btn btn-default">Logout</button></a></p>';




myfooter();
ob_end_flush();
?>