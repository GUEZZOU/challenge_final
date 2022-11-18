<?php
require_once('../pages/layout/header.php');
require_once('../pages/layout/head.php');
require_once("../pages/connexiondb.php");
?>
<h1>les inscription des honoraire </h1>
<?php
//Selection de tous les chargé client
$requetC = "SELECT * FROM chargeclient";
$resultRequetC = $pdo->query($requetC);
//Selection de tous les honoraire
$requetH = "SELECT * FROM honoraire";
$resultRequetH = $pdo->query($requetH);

if ($resultRequetC && $resultRequetH) {//c'est les deux existe je fait 
    //formulaire html avec  list déroulante
}
?>
<div class="container">

    <div class="panel panel-primary barRecherche">
        <div class="panel-heading">Les effectifs du chargé clientèle :</div>
        <div class="panel-body">
            <form method="post" action="admin.php" class="form">

                <div class="form-group">
                    <label for="nom">Nom et prénom :</label>
                    <select name="nomCc" class="form-control" id="selectChargeC">
                    <option>Tous les chargés clientèles </option>
                </div>
                <?php
                while ($tabC = $resultRequetC->fetch()) {
                    echo '<option value="'.$tabC['idChargeClient'].'">'.$tabC['nom'].''.$tabC['prenom'].'</option>';
                } ?>
                </select>
                <div class="form-group">
                    <label for="date">Date :</label>
                    <input type="date" name="date" placeholder="date" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="montant">Honoraire :</label>
                    <input type="number" name="montant" placeholder="" class="form-control" />
                </div>
                <input type="submit" name="submit"  value=" Enregistrer" class="btn btn-success"></span> </input><br>
        </div>
    </div>
</div>
 </form>
