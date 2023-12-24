<?php 

$zip = new ZipArchive();
$file ='screenshot.jpg'; 
$path = $_GET["path"];
if ($zip->open(realpath($path))) 
{
	if ($zip->locateName($file) !== false)
	{
		$stat = $zip->statName($file);
		$fp   = $zip->getStream($file);	
		
		header('Content-Type: image/jpeg');	
		header('Content-Length: ' . $stat['size']); 
		fpassthru($fp);
	}		
	else 
	{
		$noImage = "assets/images/unnamed.jpg";
		header('Content-Type: image/jpeg');	
		header('Content-Length: ' . filesize($noImage)); 
		readfile($noImage);
	}
}
else
{
	echo "file not found";
}

?>