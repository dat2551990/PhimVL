﻿<?php
if (isset($_FILES["file1"]["name"])) {
	$fileName = $_FILES["file1"]["name"];
	// The file name
	$fileTmpLoc = $_FILES["file1"]["tmp_name"];
	// File in the PHP tmp folder
	$fileType = $_FILES["file1"]["type"];
	// The type of file it is
	$fileSize = $_FILES["file1"]["size"];
	// File size in bytes
	$fileErrorMsg = $_FILES["file1"]["error"];
	// 0 for false... and 1 for true
	if (!$fileTmpLoc) {// if file not chosen
		echo "ERROR: Please browse for a file before clicking the upload button.";
		exit();
	}
	if (!is_file("../upload/$fileName")) {
		if (move_uploaded_file($fileTmpLoc, "../upload/" . $fileName)) {
			echo(mb_convert_encoding($fileName, "UTF-8"));
		} else {
			echo "Không";

		}
	}
	else {
		echo "Có Rồi";
	} 
}
?>