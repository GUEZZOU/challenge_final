<?php
require_once('../pages/layout/header.php');
require_once('../pages/layout/head.php');
require_once('connexiondb.php');
   
?>
<?php
// var_dump($_POST);
//preparation de requete
    $requeteCharge = 'UPDATE chargeClient set nom=:nom,prenom=:prenom  Where idChargeClient =:num LIMIT 1';
     $result = $pdo->prepare($requeteCharge);
     //liaisson de la requete
     $result->bindValue(':num',$_POST['idC'],PDO::PARAM_INT);//IdC c'est le name de l'input formulaire (editerChaegeCliennt) 
     $result->bindValue(':nom',$_POST['nom'],PDO::PARAM_STR);
     $result->bindValue(':prenom',$_POST['prenom'],PDO::PARAM_STR);
   //execution de la requete
$resultIsOk = $result->execute();
if($resultIsOk){
    $message='la chargé clientèle a été bien modifier!';
} else{
       $message='Aucun chargé clientèle a été modifier!!';
  
}
?>
<h1><?= $message?></h1>