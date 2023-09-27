<?php
header("refresh: 3; https://nagumo.marketingonline.click/public/");

	echo '<!DOCTYPE html>
	<html>
	<head>
	  <title>Logotipo Animado</title>
	  <link rel="stylesheet" href="styles.css">
	</head>
	<body>
	<style>
	body {
  
		display: flex;
		
		justify-content: center;
		
		align-items: center;
		 
		height: 90vh;
		}
		.logo {
		position: relative;
		width: 80px;
		height: 80px;
		animation: spin 2s infinite linear;
		
		justify-content: center;
		  
		 
		align-items: center;
	}
	
	@keyframes spin {
	  0% {
		transform: rotate(0);
	  }
	  100% {
		transform: rotate(360deg);
	  }
	}
	</style>
	  <div class="logo">
		<img src="logoHortifrut.jpg" alt="Logo">
	  </div>
	</body>
	</html>
	';
?>