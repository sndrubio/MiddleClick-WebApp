<?php
ob_start();
include ('include/common.php');
session_start();
$pageTitle = 'Company files';
mydoctype();
printPageHeader($pageTitle);
$html = '<h1>Welcome to</h1>';
$html .= '<p align="left" style="margin-left:20px; padding-left: 20px; font-size:20px; "><img src="content/img/midclik.jpg">&nbsp;&nbsp;&nbsp;We manage your files.</p>';
mybody($html);

$username= $_SESSION['username'];
$company= $_SESSION['company'];

print '<div >';

print '</div>';

    if(isset($username)){
        echo '<p style="margin-left:40px;">Hello '.$username.'. These are the files for your <strong>'.$company.'</strong></p>';
	}
    else { 
        header('location:index.php');
		echo mysql_error ();
    }


print '<table class="table table-striped" style="margin:40px;">';
	$path = 'content/'.$company.'/';
	$dirs = scandir($path);
	$data= strrchr($path, ".");
	$dataFilePath =  'content/'.$company.'/marketing.csv';

				
		if(file_exists($dataFilePath))
		{	
			$datum = readCSVData($dataFilePath);
			print '<div>';
			print '<table align="center" class="table table-striped" id="myTable" width="83%;">';
			foreach($datum as $row => $dataInRow)
			{
				$columType = "td";
				if ($row == 0)
					$columType = "th";
					print "<tr>";
					foreach($dataInRow as $columnValue)
					{
						print "<$columType>".$columnValue."</$columType>";
					}
					print "</tr>";
					}
			print "</table>";
			print '</div>';
			print '<br><br>';
		}	
	
	foreach($dirs as $file)
	{
			
		$columType = "td";	
		print "<tr>";
		print "<td>";
		
		$extension= (strrchr($file, "."));
		
		switch ($extension){
			case (".PNG"):
			case (".png"):
			case (".JPG"):
			case (".jpg"):
			case (".JPEG"):
			case (".jpeg"):
					print '<div style="margin:60px;">';
					print '<img src="content/'.$company.'/'.$file.' ">';
					print '<p><a href="content/'.$company.'/'.$file.' ">'.$file.'</a></p>';
					print '</div>';
					print '<br><br><br>';
					break;
			case (".html"):
					print '<div style="margin:60px;">';
					print '<iframe  src="content/'.$company.'/'.$file.' " width="800px" style="background-color:#FFFFFF;" ></iframe>';
					print '<p><a href="content/'.$company.'/'.$file.' ">'.$file.'</a></p>';
					print '</div>';
					print '<br><br><br>';
					break;
		}
	}
print "</table>";


print '<p align="center"><a href="logout.php"><button type="submit" class="btn btn-default">Logout</button></a></p>';
	
	
	

myfooter();
ob_end_flush();
?>