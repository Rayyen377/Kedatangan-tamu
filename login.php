<?php
	session_start();
	if (isset($_SESSION['username']) || isset($_SESSION['status'])){
		header("location:main.php?pages=home");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="stylelogin.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: Arial, sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      background: linear-gradient(#011f4b, #005b96, #6497b1);
      color: #36802d;
    }
    h1 {
      text-align: center;
      color: #fff;
      margin-bottom: 20px;
    }
    .flex-container {
      width: 100%;
  height: 100vh;
  transform: scale(1.2); /* Membuat tampilan zoom pada elemen */
  transform-origin: center; /* Pusat zoom */
      display: flex;
      align-items: center;

    }
    .container {
      background: #36802d;
      padding: 40px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      width: 100%;
      max-width: 600px;
      margin-right: 50px;
    }
    .text-side {
      color: #fff;
      max-width: 200px;
      font-size: 1.5em;
      text-align: right;
      margin-left: 20px;
    }
    .form_input, .form_button {
      width: 100%;
      padding: 10px;
      margin: 15px 0;
      border: 1px solid #00dda2;
      border-radius: 5px;
      font-size: 1em;
    }
    .form__button {
      background: #00dda2;
      color: #fff;
      cursor: pointer;
      transition: background 0.3s;
    }
    .form__button:hover {
      background: #2f72ba;
    }
    .remember-me {
      display: flex;
      align-items: center;
      margin: 10px 0;
    }
    .remember-me input {
      margin-right: 10px;
    }
    .forgot-password {
      display: block;
      text-align: right;
      color: #36802d;
      text-decoration: none;
      font-size: 0.9em;
    }
    .forgot-password:hover {
      text-decoration: underline;
    }
    .text-side img {
      max-width: 100%;
      height: auto;
      margin-bottom: 10px;
    }
  </style>
   <script>
    // Script untuk scroll ke elemen target saat halaman dimuat
    window.onload = function() {
      document.getElementById('target').scrollIntoView();
    };
  </script>
</head>
<body>
  <h1>Login</h1>
  
  <span style="color:white;">masukkan username dan password sesuai data yang tertera</span>
  <div id="target" class="flex-container">
    <div class="container">
      <form method="POST" action="database/ceklogin.php" class="form">
        <input type="text" placeholder="Username" class="form__input" name="username" id="username" required />
        <label for="username" class="form__label">Username</label>

        <input type="password" placeholder="Password" class="form__input" name="password" id="password" required />
        <label for="password" class="form__label">Password</label>

        <button type="submit" class="form__button">Login</button>
      </form>
    </div>
    <div class="text-side">
      <img src="images/logo.png" alt="School Logo" />
      <p>The Art and Culture School of Jogja</p>
    </div>
  </div>

  <script src="https://unpkg.com/gsap@3/dist/gsap.min.js"></script>
  <script src="https://unpkg.com/gsap@3/dist/ScrollTrigger.min.js"></script>
  <script>
    gsap.from(".container", {
      duration: 1,
      opacity: 0,
      y: 50,
      ease: "power1.out"
    });

    gsap.from(".text-side p", {
      duration: 1,
      opacity: 0,
      x: -50,
      ease: "power1.out",
      delay: 0.5
    });
  </script>
</body>
</html>