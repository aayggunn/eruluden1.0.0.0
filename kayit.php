<?php

	include("baglanti.php");
	
	
	if(isset($_POST["kaydet"]))
	{
		
		$name=$_POST["ad"];
		$username=$_POST["kullanici_adi"];
		$email=$_POST["email"];
		$password=password_hash($_POST["sifre"],PASSWORD_DEFAULT);
		$about=$_POST["hakkimda"];
		
		$ekle="INSERT INTO uyeler (ad, kullanici_adi, email, sifre, hakkimda) VALUES ('$name','$username','$email','$password','$about')";
		$calistirekle = mysqli_query($baglanti, $ekle);
		
		if($calistirekle)
		{
			echo '<div class="alert alert-success" role="alert">
  Kayıt Başarılı
</div>';
		header("location: anasayfa.html");
		}
		else 
		{
			echo '<div class="alert alert-danger" role="alert">
  Kayıt Başarısız. Tekrar Dene
</div>';
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
  <h1>Üye Ol</h1>
  <div class="form-container">
    <form action="kayit.php" method="POST">
      <label for="name">Ad:</label>
      <input type="text" id="name" name="ad" required>

      <label for="username">Kullanıcı Adı:</label>
      <input type="text" id="username" name="kullanici_adi" required>

      <label for="email">E-posta:</label>
      <input type="email" id="email" name="email" required>

      <label for="password">Şifre:</label>
      <input type="password" id="password" name="sifre" required>

      <label for="about">Hakkımda:</label>
      <textarea id="about" name="hakkimda" rows="4"></textarea>

      <input type="submit" value="Kaydol" name="kaydet">
    </form>
  </div>
</body>
</html>
