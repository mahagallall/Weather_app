<?php
require 'classes/City.php';

$cityHandler = new City('city.list.json');
$cities = $cityHandler->getEgyptianCities();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            
            padding: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
            font-family: 'Poppins', sans-serif;
            color: white;
            
            
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        form {
            background: #fff;
            padding: 20px 25px;
            margin: 10px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        select, button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            font-size: 16px;
            border-radius: 8px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color:rgb(68, 17, 68);
            color: white;
            border: none;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
            font-size: 18px;
            font-weight: bold;
        }

        button:hover {
            background-color:rgb(227, 161, 231);
        }
        @keyframes pop {
            from { transform: scale(0.8); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }
        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

    

<h2 class="mb-4">🌤️ Weather App</h2>
    <form action="weather_curl.php" method="POST">
        <select name="city_id" required>
            <?php foreach ($cities as $city): ?>
                <option value="<?= $city['id'] ?>"><?= $city['name'] ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">CURL</button>
    </form>

    <form action="weather_guzzle.php" method="POST">
        <select name="city_id" required>
            <?php foreach ($cities as $city): ?>
                <option value="<?= $city['id'] ?>"><?= $city['name'] ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Guzzle</button>
    </form>

</body>
</html>
