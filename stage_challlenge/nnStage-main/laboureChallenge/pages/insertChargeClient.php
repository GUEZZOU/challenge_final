<?php
//require_once('identifier.php');
require_once('../pages/layout/header.php');
require_once('../pages/layout/head.php');
require_once("../pages/connexiondb.php");
// var_dump($_POST);
//**********/preparer la requette
if (isset($_POST['nom'], $_POST['prenom'])) {
    if (!empty($_POST['nom']) && !empty($_POST['prenom'])) {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $requete =  $pdo->prepare("INSERT INTO chargeclient (nom, prenom) VALUES (?,?)");
        $result = $requete->execute(array($nom, $prenom));
        if ($result) {
            echo "
                  <script type=\"text/javascript\"> alert('bien enregistrer . identifiant:" . $pdo->lastInsertId() . "')</script>";
        } else {
            echo " 
                 <script type=\"text/javascript\"> alert('vérifier que vous avez bien remplis tous les champs !')</script>";
        }
    }
}
?>
<?php
$requeteChargeClient = "select * from ChargeClient";
$result = $pdo->query($requeteChargeClient);
?>
</body>
<div class="container">
    <div class="panel panel-primary barRecherche">
        <div class="panel-heading">Liste des chargés Clientèles</div>
        <div class="panel-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nom et Prénom</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($ChargeClientC = $result->fetch()) { ?>
                        <tr>
                            <td><input type="text" name="nomPrenom" value="<?php echo $ChargeClientC['nom'] ?> <?php echo $ChargeClientC['prenom'] ?>" class="barCharge"> </input></td>

                            <td>
                                <a title="Modifier Chargé clientèle" href="editerChargeClient.php?idC=<?php echo $ChargeClientC['idChargeClient'] ?>">
                                    <span class="glyphicon glyphicon-edit "></span>
                                </a>
                                &nbsp;
                                <a title="supprimer Chargé clientèle" onclick="return confirm('Etes vous sur de vouloir supprimer le Chargé Clientèle')" href="supprimerChargeClient.php?idC=<?php echo $ChargeClientC['idChargeClient'] ?>">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
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
</html>