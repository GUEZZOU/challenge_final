<?php
require_once('../pages/layout/header.php');
require_once('../pages/layout/head.php');
require_once("../pages/connexiondb.php");
?>
<?php
$requeteChargeClient = "select * from ChargeClient";
$resultatChargeClient = $pdo->query($requeteChargeClient);
$ChargeClient = $resultatChargeClient;

$requeteCharge = "SELECT  DISTINCT nom,prenom,montant,moisHonoraire, SUM(montant) AS total_honoraire FROM honoraire JOIN chargeclient ON honoraire.idChargeClient = chargeclient.idChargeClient WHERE moisHonoraire = MONTHNAME(date) GROUP BY honoraire.idChargeClient ORDER BY total_honoraire DESC";
$result = $pdo->query($requeteCharge);
?>

<body>
    <div class="page">

        <div class="clock-outer-body">

            <p class="display-time"></p>
            <p class="cabinet">CHALLENGE HONORAIRE</p>
            <p id="display-date" class="display-date"></p>
            <p id="display-day" class="display-date"></p>
        </div>
        <!-- ********************************** -->
        <div class="container">
            <div class="panel panel-primary barRecherche">
                <div class="panel-heading">Liste des chargés Clientèles</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>NomPrénom</th>
                                <th>Honoraire</th>
                                <th>Mois en cours</th>
                                <th>Classement</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($ChargeClientC = $result->fetch()) { ?>
                                <tr>
                                    <td><input type="text" value="<?php echo $ChargeClientC['nom'] ?> <?php echo $ChargeClientC['prenom'] ?>" class="barCharge"> </input></td>
                                    <td><?php echo $ChargeClientC['total_honoraire'] ?> €</td>
                                    <td><?php echo $ChargeClientC['moisHonoraire'] ?></td>
                                     <td>
                                        
                                        <script>
                                            let i = 0;
                                            for (i = 0; i < 1; i++) {
                                            }
                                            for (i = 0; i < 1; i++) {
                                                document.write(i + 1, '<br/>');
                                            }
                                        </script>
                                    </td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php //require_once('../pages/layout/footer.php'); 
        ?>
        <!-- ****************************************************** -->

        <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
        <script src="../js/jsChalleng.js"></script>