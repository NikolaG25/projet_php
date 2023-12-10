<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/panier.css">
    <title>DesignHub</title>
</head>


<body>
    <?php include("partials/header.php"); ?>
    <main>
        <div class="product-list-section">
            <div class="product-list">
                <!-- Liste des produits -->
                <div class="product-item">
                    <div class="product-image-group">
                        <img src="https://via.placeholder.com/115x115" class="product-image" />
                        <div class="plus-signe">+</div>
                        <img src="https://via.placeholder.com/115x115" class="product-image" />
                    </div>

                    <div class="product-item-group">
                        <div class="product-name">
                            Nom du produit (x2)
                        </div>
                        <div class="product-price">
                            24.68€
                        </div>
                    </div>
                </div>
                <!-- Répétez pour d'autres produits -->
            </div>
        </div>
        <div class="validation-section">
            
            

            <div class="total-calculation-section">
                <div class="total-calculation-line">
                    <div class="total-claculation-products">
                        Produits
                    </div>
                    <div class="total-calculation-fees">
                        24.68€
                    </div>
                </div>

                <div class="total-calculation-line">
                    <div class="tva-text">
                        TVA
                    </div>
                    <div class="total-calculation-fees">
                        5.00€
                    </div>
                </div>

                <div class="total-calculation-line">
                    <div class="transport-text">
                        Frais de transport
                    </div>
                    <div class="total-calculation-fees">
                        10.00€
                    </div>
                </div>
            </div>
            <div class="line-seperator"></div>
            <div class="total-section">
                <div class="total-text">
                    TOTAL
                </div>
                <div class="total-price">
                    39.68€
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