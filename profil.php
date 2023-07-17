<?php

	session_start();
	
	if(isset($_SESSION["kullanici_adi"]))
	{
		echo "<h3>".$_SESSION["kullanici_adi"]." HOŞGELDİN</h3>";
		echo"<a href='cikis.php' > ÇIKIŞ YAP</a>";
	}
	else 
	{
		echo "üye ol önce";
	}
?>
