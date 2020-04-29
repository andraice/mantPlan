<?php 
/*
/home4/evaniayalan/app.eyocontratistas.com/storage/app/public
/home4/evaniayalan/app.eyocontratistas.com/public/storage
*/
$targetFolder = '/home4/evaniayalan/app.eyocontratistas.com/storage/app/public';
$linkFolder = '/home4/evaniayalan/app.eyocontratistas.com/public/storage';
echo $targetFolder; 
echo '<br>';
echo $linkFolder;
symlink($targetFolder,$linkFolder);
echo 'Symlink process successfully completed';