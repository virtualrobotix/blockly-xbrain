<?php
	$filename="run.py";
	$code=$_POST['code'];
	$fp=fopen("$filename","w");fwrite($fp,$code);fclose($fp);
	system("python run.py >out.txt"); //da testare
?>
