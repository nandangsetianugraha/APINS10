<?php
	include_once("../config/config.php");
	include_once("../config/db_connect.php");
    session_start();
	$kur=$_GET['kur'];
	if($kur==1){
		$_SESSION['kurikulum']='Kurikulum 2013';
	}else{
		$_SESSION['kurikulum']='Kurikulum Merdeka';
	};
	header("location:../");
	
