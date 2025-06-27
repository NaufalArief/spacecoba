<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Space Tec '24</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body,
        html {
            height: 100%;
            font-family: 'Segoe UI', sans-serif;
            overflow: hidden;
        }

        .hero {
            position: relative;
            height: 100vh;
            width: 100vw;
        }

        .background-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: 1;
        }

        .content {
            z-index: 2;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .about-button {
            z-index: 2;
            padding: 16px 36px;
            background-color: white;
            color: black;
            font-weight: bold;
            border-radius: 9999px;
            text-decoration: none;
            font-size: 18px;
            transition: all 0.3s ease;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
            transform: translateY(5px)
        }

        .about-button:hover {
            background-color: #00009C;
            color: black;
            transform: translateY(-2px);
        }
    </style>
</head>

<body>
    <div class="hero">
        <img src="assets/img/HP.png" alt="Space Team" class="background-image" />
        <div class="content">
            <a href="about" class="about-button">ABOUT US</a>
        </div>
    </div>
</body>

</html>
