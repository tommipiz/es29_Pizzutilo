<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestione</title>
</head>
<body>
    <?php
        $nomeOggetto = $_POST["nomeOggetto"];
        $costoOggetto = $_POST["costoOggetto"];
        $quantita = $_POST["quantita"];

        if(isset($_POST["stato"])) {
            $statoOggetto = $_GET["stato"];
        }else {
            $statoOggetto = "oggetto nuovo";
        }

        $pagamento = $_POST["pagamento"]; 
        
        $totale = $costoOggetto * $quantita;
        if ($statoOggetto == "Oggetto usato") {
            $totale *= 0.8;
        }
        if ($pagamento == "carta") {
            $totale += 2;
        }

        echo "<h1>Resoconto Acquisto</h1>";
        echo "<ul>";
        echo "<li>Nome dell'oggetto: $nomeOggetto</li>";
        echo "<li>Costo iniziale: €" . number_format($costoOggetto, 2) . "</li>";
        echo "<li>Quantità: $quantita</li>";
        echo "<li>Stato dell'oggetto: $statoOggetto</li>";
        echo "<li>Metodo di pagamento: $pagamento</li>";
        echo "<li>Prezzo finale: €" . number_format($totale, 2) . "</li>";
        echo "</ul>";

    ?>
    
</body>
</html>