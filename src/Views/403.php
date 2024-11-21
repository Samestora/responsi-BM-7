<!DOCTYPE html>
<head>
    <?php include(__DIR__ . "/../Shortcodes/Header.php");?>
    <link rel="stylesheet" href="/Assets/css/navbar.css">
    <title>403 Forbidden</title>
</head>
<body>
    <?php include(__DIR__ . "/../Shortcodes/Navbar.php");?>
    <div style="display: flex; justify-content: center; align-items: center; flex-direction: column; margin-top: 5vw;">
        <h1>403 - Forbidden!</h1>
        <p>Sorry, This is a restricted Area!</p>
        <p>Redirecting you back to home...</p>
    </div>

    <script>
        var REQIRED_TIME_IN_MS=1000*5; // 5s
        setTimeout(function(){
            window.location.href= "/";
        },REQIRED_TIME_IN_MS);
    </script>
</body>
