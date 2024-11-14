<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: linear-gradient(to bottom, #f0f0f0, #e0e0e0);
            color: #333;
            margin: 0;
        }
		 body {
      font-family: Arial, sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      background: linear-gradient(#011f4b, #005b96, #6497b1);
      color: #fff;
    }
        h1 {
            margin-bottom: 20px;
            font-size: 1.5em; /* Smaller font size */
            text-align: center;
        }
        .nav-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px; /* Added spacing between links */
        }
        .nav-link, .nav-button {
            text-decoration: none;
            background: #007bff;
            color: white;
            padding: 10px 20px; /* Adjusted padding for smaller links */
            border-radius: 5px;
            transition: background 0.3s, transform 0.2s; /* Added transform transition */
            font-size: 1em; /* Adjusted font size */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Added shadow for depth */
            border: none; /* Remove default button border */
            cursor: pointer; /* Change cursor to pointer for button */
        }
        .nav-link:hover, .nav-button:hover {
            background: #0056b3;
            transform: translateY(-2px); /* Subtle lift effect on hover */
        }
    </style>
</head>
<body>
    <h1>Hai! Anda masuk sebagai Siapa?
    </h1>
    <div class="nav-container">
        <a href="pages/form/index.php" class="nav-link">Tamu</a>
        <button class="nav-button" onclick="window.location.href='login.php'">Anggota Sekolah</button>
    </div>
</body>
</html>
