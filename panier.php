<!DOCTYPE html>
<html lang="fr">
        
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/panier.css">
    <title>DesignHub</title>
</head>
<?php
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=BD_sslo;charset=utf8', 'sslo', '');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

     
        $idClient = 1;

        // Récupérer la liste des produits dans le panier du client
        $sqlProducts = "SELECT * FROM transaction WHERE ID_client = :idClient";
        $statementProducts = $bdd->prepare($sqlProducts);
        $statementProducts->bindParam(':idClient', $idClient, PDO::PARAM_INT);
        $statementProducts->execute();
        $products = $statementProducts->fetchAll(PDO::FETCH_ASSOC);

        // Calcul total des produits, la TVA et les frais de transport
        $sqlTotalProducts = "SELECT SUM(PrixAchat * Quantite) AS totalProducts FROM transaction WHERE ID_client = :idClient";
        $statementTotalProducts = $bdd->prepare($sqlTotalProducts);
        $statementTotalProducts->bindParam(':idClient', $idClient, PDO::PARAM_INT);
        $statementTotalProducts->execute();
        $totalProducts = $statementTotalProducts->fetch(PDO::FETCH_ASSOC)['totalProducts'];

        // Calcul du TVA et les frais de transport
        $tva = $totalProducts * 0.20; // Supposons une TVA de 20%
        $fraisTransport = 10.00; //frais de transport

        // le total général
        $totalGeneral = $totalProducts + $tva + $fraisTransport;
        ?>

<body>
    <?php include("partials/header.php"); ?>
    <main>
        <div class="product-list-section">
            <div class="product-list">
                <!-- Liste des produits -->
                <?php foreach ($products as $product) : ?>
                    <div class="product-item">
                        <!-- ... Afficher les détails du produit ... -->
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="validation-section">
            <div class="total-calculation-section">
                <!-- Afficher le calcul du total -->
                <div class="total-calculation-line">
                    <div class="total-claculation-products">
                        Produits
                    </div>
                    <div class="total-calculation-fees">
                        <?php echo number_format($totalProducts, 2); ?>€
                    </div>
                </div>
                <div class="total-calculation-line">
                    <div class="tva-text">
                        TVA
                    </div>
                    <div class="total-calculation-fees">
                        <?php echo number_format($tva, 2); ?>€
                    </div>
                </div>
                <div class="total-calculation-line">
                    <div class="transport-text">
                        Frais de transport
                    </div>
                    <div class="total-calculation-fees">
                        <?php echo number_format($fraisTransport, 2); ?>€
                    </div>
                </div>
            </div>
            <div class="line-seperator"></div>
            <div class="total-section">
                <div class="total-text">
                    TOTAL
                </div>
                <div class="total-price">
                    <?php echo number_format($totalGeneral, 2); ?>€
                </div>
            </div>
            <div class="validate-button">
                <a href="#">Valider ma commande</a>
            </div>
        </div>
    </main>
    <?php include("partials/footer.php"); ?>
</body>

</html>