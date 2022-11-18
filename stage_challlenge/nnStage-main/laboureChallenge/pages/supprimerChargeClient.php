<?php
require_once('../pages/layout/header.php');
require_once('../pages/layout/head.php');
require_once("../pages/connexiondb.php");
?>

<?php 
//preparation de requete
$requeteChargeClient = "DELETE from ChargeClient WHERE idChargeClient =:num LIMIT 1";
$result = $pdo->prepare($requeteChargeClient);

//liaisson de la requete
$result ->bindValue(':num',$_GET['idC'],PDO::PARAM_INT);
//execution de la requete
$resultIsOk = $result->execute();
if($resultIsOk){
    $message='la chargé clientèle a été bien supprimé';
 } else{
        $message='Echec de la suppression';
   
}
// header("location:pages/insertChargeClient.php")
?>
<h1><?= $message?></h1>