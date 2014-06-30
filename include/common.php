<?php

function mydoctype()
{
print '<!doctype html>';
}

function printPageHeader($pageTitle)
{
	print '<head>'.PHP_EOL;
	print '<title>'.PHP_EOL;
	print $pageTitle;
	print '</title>'.PHP_EOL;
	
	
	print '<meta name="viewport" content="width=device-width, initial-scale=1.0">'.PHP_EOL;
    print '<meta name="description" content="MiddleClik">'.PHP_EOL;
    print '<meta name="author" content="Sandra Rubio">'.PHP_EOL;
	print '<link href="css/bootstrap.css" rel="stylesheet">'.PHP_EOL;
	print '<link href="css/bootstrap.min.css" rel="stylesheet">'.PHP_EOL;
	print '<link href="css/bootstrap-responsive.css" rel="stylesheet">'.PHP_EOL;
	print '<link href="css/bootstrap-responsive.min.css" rel="stylesheet">'.PHP_EOL;
	
	echo'
	<style type="text/css">
      body {
        padding-top: 20px;
        padding-bottom: 45px;
		background-color: #C0C0C0;
		font-family:Verdana, Arial, Helvetica, sans-serif;
        min-width:1200px;
		color: #16365D;
		}
	  
	  #myTable tr:nth-child(odd) {
		background-color: #DEDEDA;
		color: #16365D;
		}
		
	  #myTable tr:nth-child(even) {
		background-color: #E47C7C;
		color: #16365D;
		}
	  
    </style>		
	';
	print '</head>'.PHP_EOL;
}


function mybody($bodyContents = '', $asideContent = '')
{


print '<body>';
print '<div>';
print $bodyContents;
myaside($asideContent);
print '<br><br><br>';
print '</div>';
print '</body>';
}

function myaside($asideContent)
{
print '<div id="aside">';
print $asideContent;
print '</div>';
}

function loadFile()
{
	if (isset($_POST['mycompany']))    
	{    
		$mycompany=$_POST['mycompany']; 
		$marketingCampaignName=$_POST['marketingCampaignName'];
		$desiredPath = '../content/'.$mycompany.'/'.$marketingCampaignName;	
		if ($_SERVER['REQUEST_METHOD'] == "POST")
		{
			print "Picture Info"."<br>";
			print_r($_FILES['picture']);
			
			$file_ext = strrchr($_FILES['picture']['name'], '.');
			
			if (move_uploaded_file($_FILES['picture']['tmp_name'], $desiredPath.$_FILES['picture']['_'].$file_ext))
			{
				print 'File Upload Successful';
				print '<div>';
				print '<img width="300px" src="'.$desiredPath.$_FILES['picture']['_'].$file_ext.'">';
				print '</div>';
			}
			else
			{
				print 'File Upload Failed with error code: '.$_FILES['picture']['error'];
			}
		}else{

	  print '<h1>Please introduce the company you are managing</h1>';
	} 
	}

}



function initializeFile($path)
{
	if (!file_exists($path))
	{
		touch($path);
	}
}

function updateDataFile($path, $content, $flags = NULL)
{
	initializeFile($path);
	return file_put_contents($path, $content, $flags);
}


function saveText()
{

	if (isset($_POST['data']))
	{	
		$mycompany=$_POST['mycompany']; 
		$marketingCampaignName=$_POST['marketingCampaignName'];
		$dataFilePath = '../content/'.$mycompany.'/'.$marketingCampaignName.'.html';
		if ($_POST['data'] != " ") {
			if (updateDataFile($dataFilePath, htmlspecialchars($_POST['data']).PHP_EOL, FILE_APPEND | LOCK_EX))
			{
				print "Data uploaded successfuly!";
			}
			else
			{
				print "Data failed to upload";
			}
		}
	}

}





define('DATA_DIRECTORY',"Content");

//assignment specific functions
function loadCSVData()
{
if (isset($_POST['mycompany']))    
{    
	$mycompany=$_POST['mycompany']; 
	$marketingCampaignName=$_POST['marketingCampaignName'];
	$desiredPath = '../content/'.$mycompany.'/marketing';	
	if ($_SERVER['REQUEST_METHOD'] == "POST")
	{
		print "CSV Info"."<br>";
		print_r($_FILES['csv']);
		
		$file_ext = strrchr($_FILES['csv']['name'], '.');
		
		if (move_uploaded_file($_FILES['csv']['tmp_name'], $desiredPath.$_FILES['csv']['_'].$file_ext))
		{
			print 'File Upload Successful';
		}
		else
		{
			print 'File Upload Failed with error code: '.$_FILES['picture']['error'];
		}
	}else{

  print '<h1>Please introduce the company you are managing</h1>';
} 
}
}




function readCSVData($dataFilePath)
{
		$dataFile = file($dataFilePath);
		$datum = array();
		
		foreach($dataFile as $line)
		{
			$datum[] = str_getcsv($line);
		}
		
		return $datum;
}




function myfooter()
{
print '</html>';
}

?>