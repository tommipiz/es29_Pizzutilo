<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambio</title>
</head>
<body>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; background-color: #e0f7fa; }
        img { width: 50px; }
    </style>

<?php
    $exchangeRates = [
        "dollaro" => 1.1,
        "yen" => 150,
        "franco" => 1.05,
        "sterlina" => 0.85
    ];

    $amount = isset($_GET['amount']) ? floatval($_GET['amount']) : 0;
    $currency = isset($_GET['currency']) ? $_GET['currency'] : '';

    $commissionRate = (date('N') >= 6) ? 0.05 : 0.025; // 5% nel weekend, 2.5% in settimana
    $commission = $amount * $commissionRate;
    $finalAmount = $amount - $commission;
    $convertedAmount = $finalAmount * ($exchangeRates[$currency] ?? 0);

    ?>

    <h1>Risultato Cambio</h1>
    <img src="https://www.worldometers.info/img/flags/it-flag.gif" alt="Bandiera Italia">
    <p>Importo in Euro: €<?php echo number_format($amount, 2); ?></p>
    <p>Commissione: €<?php echo number_format($commission, 2); ?></p>
    <p>Importo finale in Euro: €<?php echo number_format($finalAmount, 2); ?></p>

    <?php if ($currency): ?>
        <img src=" <?php echo $flags[$currency]; ?> " alt="Bandiera <?php echo $currency; ?>">
        <p>Importo convertito in <?php echo $currency; ?>: <?php echo number_format($convertedAmount, 2); ?></p>
<?php endif; ?>

<a href="valuta.html">Torna indietro</a>

</body>
</html>

