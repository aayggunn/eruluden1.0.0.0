<?php
	include("baglanti.php");
	
	if(isset($_POST["giris"]))
	{
		$username = $_POST["kullanici_adi"];
		$email = $_POST["email"];
		$password = $_POST["sifre"];
		
		if(isset($username) && isset($password))
		{
			$secim = "SELECT * FROM uyeler WHERE kullanici_adi = '$username'";
			$calistir = mysqli_query($baglanti, $secim);
			$kayitsayisi = mysqli_num_rows($calistir);
			
			if($kayitsayisi > 0)
			{
				$ilgilikayit = mysqli_fetch_assoc($calistir);
				$hashlisifre = $ilgilikayit["sifre"];
				
				if(password_verify($password, $hashlisifre))
				{
					session_start();
					$_SESSION["kullanici_adi"] = $ilgilikayit["kullanici_adi"];
					$_SESSION["email"] = $ilgilikayit["email"];
					header("location: anasayfa.html");
				}
				else
				{
					echo '<div class="alert alert-danger" role="alert">
  						Şifre Yanlış 
					</div>';
				}
			}
			else
			{
				echo '<div class="alert alert-danger" role="alert">
  					Kullanıcı Adı veya Şifre Yanlış 
					</div>';
			}
		}
	}
		
	mysqli_close($baglanti); 
?>

<!DOCTYPE html>
<html>
<head>
  <title>Erülüden | Üye Ol </title>
  <style>
    body {
      background-color: white;
    }

    h1, p {
      color: dodgerblue;
	  text-align:center;
	  font-family: arial;
	  margin-top:50px;
    }

    .form-container {
      width: 500px;
      margin: 0 auto;
      padding: 20px;
      background-color: aliceblue;
      border-radius: 10px;
    }

    .form-container label {
      display: block;
      margin-bottom: 20px;
    }

    .form-container input[type="text"],
    .form-container input[type="email"],
    .form-container input[type="password"],
    .form-container textarea {
      width: 100%;
      padding: 5px;
      margin-bottom: 10px;
      border-radius: 5px;
    }

    .form-container input[type="submit"] {
      background-color: dodgerblue;
      color: white;
      padding: 10px;
      border: none;
      border-radius: 10px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <h1>Giriş Yap</h1>
  <div class="form-container">
    <form action="login.php" method="POST">

      <label for="username">Kullanıcı Adı:</label>
      <input type="text" id="username" name="kullanici_adi" required>

      <label for="password">Şifre:</label>
      <input type="password" id="password" name="sifre" required>

		<label for="email">E-posta:</label>
      <input type="email" id="email" name="email" required>
      <input type="submit" value="Giriş" name="giris">
    </form>
  </div>
</body>
</html>
