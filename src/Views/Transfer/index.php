<!DOCTYPE html>
<head>
    <?php include(__DIR__ . "/../../Shortcodes/Header.php");?>
    <link rel="stylesheet" href="/Assets/css/transfer.css">
    <link rel="stylesheet" href="/Assets/css/slideshow.css">
    <link rel="stylesheet" href="/Assets/css/sellplayer.css">
    <link rel="stylesheet" href="/Assets/css/buyplayer.css">
    <link rel="stylesheet" href="/Assets/css/currenttransfer.css">
    <link rel="stylesheet" href="/Assets/css/partner.css">
    <link rel="stylesheet" href="/Assets/css/footer.css">
    <style>
        /* Mengatur html dan body untuk memastikan scroll dapat berfungsi */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow-x: hidden; /* Menyembunyikan overflow horizontal */
            overflow-y: auto; /* Menyediakan scroll vertikal */
        }

        /* Container untuk tiga tabel */
        .table-container {
            display: flex;
            flex-wrap: wrap; /* Membuat elemen-elemen dapat membungkus jika ruang terbatas */
            justify-content: space-between;
            align-items: flex-start;
            gap: 15px;
            margin: 20px auto;
            width: 100%;
            padding: 0 20px;
        }

        /* Styling untuk masing-masing tabel */
        .table-wrapper {
            flex: 1;
            min-height: 500px; /* Menyesuaikan tinggi dengan konten */
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        .table-wrapper h3 {
            text-align: center;
            padding: 12px;
            background-color: #e30613; /* Warna tema */
            color: white;
            margin: 0;
        }

        /* Isi tabel */
        .table-wrapper-content {
            padding: 10px;
            height: calc(100% - 48px); /* Tinggi tabel dikurangi header */
            overflow-y: auto; /* Scroll jika konten melebihi tinggi */
        }

        /* Styling untuk Budget Section */
        .budget-section {
            text-align: center;
            margin: 30px auto;
            padding: 10px 10px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
            width: 100%;
            max-width: 480px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .budget-section h1 {
            font-size: 1.3rem;
            color: #333;
            margin-bottom: 5px;
        }

        .budget-section h2 {
            font-size: 2.5rem;
            color: #e30613; /* Warna budget */
            margin-bottom: 15px;
        }

        /* Tombol Commit Transaction */
        .tr-commit {
            padding: 12px 24px;
            font-size: 1rem;
            background-color: #e30613;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }

        .tr-commit:hover {
            background-color: #b4050f;
        }

        /* Responsif untuk layar kecil */
        @media (max-width: 768px) {
            .table-container {
                flex-direction: column; /* Tabel turun ke bawah */
                gap: 20px;
            }

            .table-wrapper {
                min-height: 400px;
                width: 100%;
            }

            .budget-section {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    <?php include(__DIR__ . "/../../Shortcodes/Navbar.php"); ?>
    
    <?php if ($error === ''): ?>
    <div class="table-container">
        <!-- Tabel 1 -->
        <div class="table-wrapper">
            <h3>Sell Player</h3>
            <div class="table-wrapper-content">
                <?php include(__DIR__ . "/../../Shortcodes/SellPlayer.php"); ?>
            </div>
        </div>

        <!-- Tabel 2 -->
        <div class="table-wrapper">
            <h3 style="background-color: #0066B2">Current Transfer</h3>
            <div class="table-wrapper-content">
                <?php include(__DIR__ . "/../../Shortcodes/CurrentTransfer.php"); ?>
            </div>
        </div>

        <!-- Tabel 3 -->
        <div class="table-wrapper">
            <h3>Buy Player</h3>
            <div class="table-wrapper-content">
                <?php include(__DIR__ . "/../../Shortcodes/Slideshow.php"); ?>
                <?php include(__DIR__ . "/../../Shortcodes/BuyPlayer.php"); ?>
            </div>
        </div>
    </div>
    
    <!-- Budget Section -->
    <div class="budget-section">
        <h1>Budget</h1>
        <h2><?= htmlspecialchars("€" . number_format($currentRevenue, 0, '.', ',')); ?></h2>
        <button class="tr-commit">Commit Transaction</button>
    </div>
    <?php else: ?>
    <h1 style="text-align: center; color: #e30613;">
        <?= htmlspecialchars($error); ?>
    </h1>
    <?php endif; ?>
    <?php include(__DIR__ . "/../../Shortcodes/Partner.php"); ?>
    <?php include(__DIR__ . "/../../Shortcodes/Footer.php"); ?>
    <script src="/Assets/js/transferAjax.max.js"></script>

</body>
