<?php
	session_start();
    $ssn=md5("SwachhBharatKey");
	if(!isset($_SESSION[$ssn]))
        echo "<script>alert('Login again!');window.location.href='index.php'</script>";
	
    include("config.php");
    $ssnchkvar =  $_SESSION[$ssn];
    $ssnqry = "SELECT * FROM `users` WHERE `ssnvar`='".$ssnchkvar."'";
    $run_ssnqry=mysqli_query($con,$ssnqry);
    if(mysqli_num_rows($run_ssnqry) != 1)
    {
        mysqli_close($con);
		session_destroy();
		session_unset();  
    }
	$checker=$_GET['type'];
	if($checker=='disable')
		$val=0;
	else if($checker=='enable')
		$val=1;

	$query="UPDATE workers SET status=".$val." WHERE id=".$_GET['id'];
	$exquery=mysqli_query($con,$query);
	
	echo("<script>window.location.href='admin.php';</script>");
	
?>