<!DOCTYPE html>
<head>
    <?php include(__DIR__ . "/../Shortcodes/Header.php");?>
    <link rel="stylesheet" href="/Assets/css/navbar.css">
    <title>404 Not Found</title>
</head>
<body>
    <?php include(__DIR__ . "/../Shortcodes/Navbar.php");?>
    <div style="display: flex; justify-content: center; align-items: center; flex-direction: column; margin-top: 5vw;">
        <h1>404 - Page Not Found</h1>
        <p>Sorry, the page you requested was not found.</p>
        <p>Redirecting you back to home...</p>
    </div>

    <script>
        var REQIRED_TIME_IN_MS=1000*30; // 10 s
        setTimeout(function(){
            window.location.href= "/";
        },REQIRED_TIME_IN_MS);
    </script>
</body>
