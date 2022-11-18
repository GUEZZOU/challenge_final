<?php
require_once('../pages/layout/header.php');
require_once('../pages/layout/head.php');
require_once("../pages/connexiondb.php");
?>
<!-- ********************************************************* -->
<?php
//var_dump($_GET);
//requet pour 
$requetC = "SELECT DISTINCT *FROM honoraire INNER JOIN chargeClient ON honoraire.idChargeClient= chargeclient.idChargeClient ORDER BY nom , moisHonoraire = MONTHNAME(date)DESC";
$resultRequetC = $pdo->query($requetC);
$HonoraireMois = $resultRequetC;
?>
<!-- pour le combobox -->
<?php
if (isset($_GET['nomC']))
  $nomC = $_GET['nomC'];
else
  $nomC = "";
if (isset($_GET['mois']))
  $mois = $_GET['mois'];
else
  $mois = "Tous les mois";
if ($mois == "Tous les mois") {
  $requetCharge = "SELECT  DISTINCT *FROM chargeClient
   where nom like '%$nomC%";
   
}
?>

<!-- pour l'insertEffectifCc -->
<?php
// var_dump($_POST);

 //******vérifier que le bouton ajouter a bien été cliqué
 if (isset($_POST['submit'])) {
    $nom = $_POST['nomCc'];
    $date = $_POST['date'];
    $montant = $_POST['montant'];
    //******verifier que tous les champs ont été remplis
    if (!empty($nom)  && !empty($date) && !empty($montant)) 
    {
   
     //*****requête d'ajout
    $requetC="INSERT INTO `honoraire`(`montant`, `date`,`idChargeClient`) VALUES(:montat,:date,:idChargeClient)";
     $requete = $pdo->prepare( $requetC);
      $requete->bindValue(':idChargeClient', $nom);
      $requete->bindValue(':date', $date);
      $requete->bindValue(':montant', $montant);
     $result = $requete->execute();
     if (!$result) {
         echo "probleme est survenu";
         header("location: index.php");
     } else {
         echo "
           <script type=\"text/javascript\"> alert('bien enregistrer . identifiant:" . $pdo->lastInsertId()."')</script>";
     }
 } else {
     echo "<script type=\"text/javascript\"> alert('vérifier que vous avez bien remplis tous les champs !')</script>";
 }
}
?>
<!-- *******FORMULAIRE POUR LE COMBOBOX-->
 <div class="container"> 
  <div class="panel panel-primary barRecherche">
    <div class="panel-heading">Rechercher des chargés clientèles.</div>
    <div class="panel-body">
      <form method="get" action="admin.php" class="form-inline">
        <div class="form-group">
          <label for="login">Liste de chargés clientèles :</label>
          <select name="nameC" class="form-control" id="login" onchange="this.form.submit()">
            <option>Tous les chargés clientèles </option>
            <?php
            // ****requete pour recupérer les chargé client
            $requetCharge = "SELECT  DISTINCT *FROM chargeClient";
            $resultRequetCharge  = $pdo->query($requetCharge);
            while ($tabC = $resultRequetCharge->fetch()) {
              echo '<option value="' . $tabC['idChargeClient'] . '">' . $tabC['nom'] . ' ' . $tabC['prenom'] . '</option>';
            } ?>
          </select>
        </div>
        &nbsp;&nbsp;
        <div class="form-group">
          <label for="mois">Mois :</label>
          <select name="mois" class="form-control" id="mois" onchange="this.form.submit()">
            <option value="Tous les mois">Tous les mois </option>
            <option value="">JAN</option>
            <option value="">FÉV</option>
            <option value="">MARS</option>
            <option value="">AVRIL</option>
            <option value="">MAI</option>
            <option value="">JUIN</option>
            <option value="">JUILL</option>
            <option value="">AOÛT</option>
            <option value="">SEPT</option>
            <option value="">OCT</option>
            <option value="">NOV</option>
            <option value="">DÉC</option>
            <?php
            $requetHonoraire = "SELECT  DISTINCT *FROM honoraire";
            $resultRequetHonoraire  = $pdo->query($requetHonoraire);
            // while ($tabH = $resultRequetHonoraire->fetch()) {
            //   echo '<option value="'.$tabC['idChargeClient'].'">'.$tabH[' moisHonoraire'].'</option>';
            //} 
            ?>
          </select>
        </div>
        <input type="submit" name=" Chercher" id="" value=" Chercher" class="btn btn-success"> </input><br>
      </form>
    </div>
  </div>
</div>

<div class="container">
  <div class="panel panel-primary barRecherche">
    <div class="panel-heading"></div>
    <div class="panel-body">
      <form method="post" action="admin.php" class="form-inline">
        <a href="insertEffectifCc.php">
          <span class="glyphicon glyphicon-plus"></span>
          Saisir les effectifs du chargés Clientèles
        </a>
        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
        <a href="nouveauChargeClient.php">
          <span class="glyphicon glyphicon-plus"></span>
          Nouveau chargé Clientèle
        </a>
  
      </form>
    </div>
  </div>
  <div class="panel panel-primary">
    <div class="panel-heading">Liste des chargés Clientèles</div>
    <div class="panel-body">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Id chargeClient</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date</th>
            <th>Honoraire</th>
            <th>Honoraire/mois</th>
            <th>Actions</th>
          </tr>
        </thead>

        <tbody>
          <?php while ($ChargeClient = $resultRequetC->fetch()) { ?>
            <tr>
              <td><?php echo $ChargeClient['idChargeClient'] ?> </td>
              <td><?php echo $ChargeClient['nom'] ?> </td>
              <td><?php echo $ChargeClient['prenom'] ?> </td>
              <td>
                <?php echo $ChargeClient['date'] ?>&nbsp;&nbsp;
                <a title="editer la date" href="editerDate.php?idC=<?php echo $ChargeClient['idChargeClient'] ?>">
                  <span class="glyphicon glyphicon-edit "></span>
                </a>
                &nbsp;
              </td>
              <td>
                <?php echo $ChargeClient['montant'] ?>&nbsp;&nbsp;
                <a title="editer l'honoraire" href="editerMontat.php?idC=<?php echo $ChargeClient['idChargeClient'] ?>">
                  <span class="glyphicon glyphicon-edit "></span>
                </a>
                &nbsp;
              </td>
              <td><?php echo $ChargeClient['moisHonoraire'] ?> </td>
              <td>
                <a title="editer Chargé client" href="editerChargeClient.php?idC=<?php echo $ChargeClient['idChargeClient'] ?>">
                  <span class="glyphicon glyphicon-edit "></span>
                </a>
                &nbsp;
                <a title="supprimer Chargé client" onclick="return confirm('Etes vous sur de vouloir supprimer le Chargé Clientèle')" href="supprimerChargeClient.php?idC=<?php echo $ChargeClient['idChargeClient'] ?>">
                  <span class="glyphicon glyphicon-trash"></span>
                </a>
              </td>
            </tr>
        </tbody>
      <?php } ?>
      </table>
    </div>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
<script src="../js/jsChalleng.js"></script>

<?php require_once('../pages/layout/footer.php'); ?>