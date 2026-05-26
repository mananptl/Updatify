<?php

$version_updates = [

    "25.36" => [
        "details" => "Maintained details of all bugs resolved. 
Added parameter: WS-INV Insurance Posting at Customer.

Applied reduced discount effect for EV vehicles in the Road Tax report.

Blocked duplicate Chassis Numbers during Excel upload in Vehicle Purchase.

Branch check applied exclusively when the selected report type is one of the following
• Summary – Product
• Summary – Colour
• Stock List – Product",
        "link"    => "https://drive.google.com/uc?export=download&id=172y6dVtvRG3EMm2vKJfrcUZcum7_aZB6"
    ],

    "25.30" => [
        "details" => "* Workshop Daily Collection Report Update According New GST Rate.",
        "link"    => "https://drive.google.com/uc?export=download&id=1OWu9Qx1AN544b3Z_rG1nl3ODasUro7vg"
    ],

    "25.29" => [
        "details" => "* Add Auto Backup in Server
* Update Vehicle Purchase According New GST Rate
* Add HSN Into HSN MASTER From Already Existing Records in AUTOMANGER at Login Time
* Add HSN-HELP For HSN Entry Instead Manually",
        "link"    => "https://drive.google.com/uc?export=download&id=1DYGDjYyXufhs9aeHNIR7Skhs289LaaL5"
    ],

    "25.28.4" => [
        "details" => "* Update Product/Model Master
* Add Deactive Option in Tax Transection Master",
        "link"    => "https://drive.google.com/uc?export=download&id=14l9PDFWASnILzkr-hYXPN13JvXPPv0E4"
    ],

    "25.28" => [
        "details" => "* Add Qty effect In Quotation Print
* Update Product Tax Rate Master
* Provide HSN Help In Product Class Master
* Update GST Version 2.0",
        "link"    => ""
    ],

    "25.27" => [
        "details" => "* GST 2.0 Introduced
* GST RATE AUTO UPDATE DETAIL :-
(GST PER 28 % )+(CESS PER 1% OR ABOVE 1%) → UPDATE TO GST PER 40%
(GST PER 28 % )+(CESS PER 0%) → UPDATE TO GST PER 18%
(GST PER 12 % ) → UPDATE TO GST PER 5%
(GST PER 06 % ) → UPDATE TO GST PER 5%",
        "link"    => ""
    ]
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>AutoManager Version Updates</title>
<link rel="icon" type="image/png" href="auto.png">

<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #0e1f1f, #163030);
        margin: 0;
        padding: 0;
        color: #e8fefe;
    }
    header {
        background: linear-gradient(90deg, #0b4f44, #148f77);
        text-align: center;
        padding: 40px 20px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.4);
    }
    header h1 {
        margin: 0;
        font-size: 2.4em;
        letter-spacing: 2px;
        color: #7fffd4;
        text-shadow: 0 0 10px #00e6a6;
    }
    header p {
        margin-top: 10px;
        font-size: 1.2em;
        color: #c2f5e9;
        opacity: 0.9;
    }

    .container {
        padding: 50px 20px;
        max-width: 1200px;
        margin: auto;
    }

    .version-container {
        display: flex;
        flex-wrap: wrap;
        gap: 25px;
        justify-content: center;
    }

    .version-card {
        background: linear-gradient(145deg, #1e2a2a, #264040);
        border-radius: 15px;
        padding: 25px;
        width: 340px;
        height: 380px;
        display: flex;
        flex-direction: column;
        box-shadow: 0 6px 18px rgba(0,0,0,0.5);
        transition: 0.3s ease;
    }

    .version-card:hover {
        transform: translateY(-10px) scale(1.03);
        background: linear-gradient(145deg, #2f4f4f, #17e6b7);
        box-shadow: 0 18px 45px rgba(0,0,0,0.7);
    }

    .version-number {
        font-size: 1.7em;
        text-align: center;
        font-weight: bold;
        color: #00ffa6;
        margin-bottom: 15px;
        text-shadow: 0 0 6px #00ffa6, 0 0 12px #00ffa6;
    }

    .change-details {
        flex: 1;
        overflow-y: auto;
        padding-right: 7px;
    }

    .change-details ul {
        margin: 0;
        padding-left: 15px;
        list-style: none;
    }

    .change-details ul li {
        margin: 8px 0;
        padding-left: 25px;
        position: relative;
        font-size: 0.95em;
        line-height: 1.5;
        color: #d7fffa;
    }

    .change-details ul li::before {
        content: "✔";
        position: absolute;
        left: 0;
        color: #00ffa6;
        font-weight: bold;
    }

    .download-btn {
        margin-top: 15px;
        text-align: center;
        display: block;
        padding: 12px;
        border-radius: 10px;
        background: #00ffa6;
        color: #003322;
        font-weight: bold;
        text-decoration: none;
        transition: 0.3s;
    }

    .download-btn:hover {
        background: #00d48b;
        color: #001a14;
    }

    .change-details::-webkit-scrollbar {
        width: 6px;
    }
    .change-details::-webkit-scrollbar-thumb {
        background: #00ffa6;
        border-radius: 10px;
    }
    .change-details::-webkit-scrollbar-thumb:hover {
        background: #00d48b;
    }

</style>
</head>

<body>

<header>
    <h1>Company Name</h1>
    <p>Version Update Details</p>
</header>

<div class="container">
    <div class="version-container">

        <?php foreach($version_updates as $version => $data): ?>
        <div class="version-card">

            <div class="version-number">v<?php echo $version; ?></div>

            <div class="change-details">
                <ul>
                    <?php 
                    $lines = array_filter(array_map('trim', explode("\n", $data['details'])));
                    foreach($lines as $line): ?>
                        <li><?php echo htmlspecialchars($line); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <?php if (!empty($data['link'])): ?>
                <a href="<?php echo $data['link']; ?>" class="download-btn">⬇ Download v<?php echo $version; ?></a>
            <?php else: ?>
                <span class="download-btn" style="background:#555;color:#eee;">❌ Not Available</span>
            <?php endif; ?>

        </div>
        <?php endforeach; ?>

    </div>
</div>

</body>
</html>
