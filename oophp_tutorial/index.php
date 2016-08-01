<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>OOPHP Tutorial Project</title>
</head>
<body>
<h1>Page is working!</h1>
 <?php
require 'DirectoryItems.php';
$dc = new DirectoryItems('graphics');
$dc->imagesOnly();
$dc->naturalOrderSortCaseInsensitive();
$path = "";
$filearray = $dc->getFileArray();
echo "<div style=\"text-align:center;\">";
echo "Click the filename to view full-sized version.<br />";
//specify size of thumbnail 
$size = 100;
foreach ($filearray as $key => $value){
    $path = "graphics/".$key;
    /*errors in getthumb or in class will result in broken links
    - error will not display*/
    echo "<img src=\"getthumb.php?path=$path&amp;size=$size\" ".
        "style=\"border:1px solid black;margin-top:20px;\" ".
        "alt= \"$value\" /><br />\n";
    echo "<a href=\"$path\" target=\"_blank\" >";
    echo "Title: $value</a> <br />\n";
}
echo "</div><br />";
?>
<p>Bottom of page</p>
</body>
</html>