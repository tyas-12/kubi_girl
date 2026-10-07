<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KUBI</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }

        body {
            min-height: 100vh;
            background: linear-gradient(160deg, #6a1b9a 0%, #ab47bc 50%, #f8bbd0 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        .splash {
            width: 100%;
            max-width: 420px;
            min-height: 80vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            text-align: center;
            cursor: pointer;
        }

        .welcome-text {
            color: white;
            font-size: clamp(22px, 4vw, 30px);
            font-weight: 600;
        }

        .logo-area {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            flex: 1;
        }

        .logo-img {
            max-width: 320px;
            width: 80%;
            height: auto;
        }

        .bottom-area {
            width: 100%;
        }

        .loading-bar {
            width: 100%;
            height: 6px;
            background: rgba(255,255,255,0.3);
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 15px;
        }

        .loading-bar-fill {
            width: 60%;
            height: 100%;
            background: white;
            border-radius: 10px;
        }

        .swipe-text {
            color: white;
            font-size: 14px;
            opacity: 0.85;
        }
    </style>
</head>
<body>

<div class="splash">
    <div class="welcome-text">Welcome to<br>Kubi</div>

    <div class="logo-area">
        <img src="assets/img/logo_kubi.png" class="logo-img" alt="Logo KUBI">
    </div>

    <div class="bottom-area">
        <div class="loading-bar"><div class="loading-bar-fill"></div></div>
        <div class="swipe-text">Geser untuk memesan</div>
    </div>
</div>

<script>
    setTimeout(function() {
        window.location.href = "index.php";
    }, 2500);

    document.querySelector('.splash').addEventListener('click', function() {
        window.location.href = "index.php";
    });
</script>

</body>
</html>