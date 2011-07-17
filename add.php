<html>
<?php 
include 'db.php';

function make_comic($title, $url, $author){
	//add a comic to database
	$comic = new comicDbHandler(SERVER, DB, USR, PWD);
	
	
	//generate webpage for comic
	$filename = "data/index.php";
	$fp = fopen($filename, "r");
	//$contents = fread($handle, filesize("usr.txt"));
	$contents = file($filename);
	fclose($fp);
	
	
	//echo $contents;
	$id = $comic->add_comic($title, $url, $author);
	$contents[3] = "\$id = ".$id.";";
	$filename = 'data/'.$id.".php";
	$fp_w = fopen($filename, "w+");
	
	//file_put_contents("test.txt",implode(",",$contents));
	
	foreach($contents as $key => $value){
	fwrite($fp_w,$value."\t");
	}
	fclose($fp_w);
	
	//print_r($contents);
	
	
	
	
}
if ($_POST["title"] !=''&&$_POST["url"]!= '' && $_POST["author"] != ''){
make_comic($_POST["title"], $_POST["url"], $_POST["author"]);             

?>

<h1> Comic Added</h1>
<a href= "admin.php">back</a>
<?php 
}
else{
	?>
	<h1> Comic Not added </h1>
	<a href= "admin.php">back</a>
<?php }?>
</html>
	
		
