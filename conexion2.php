﻿<?php
	
	
	$mysqli=new mysqli("localhost","wwwvideo_root","V1de0@cces0s","wwwvideo_video_accesos"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
?>