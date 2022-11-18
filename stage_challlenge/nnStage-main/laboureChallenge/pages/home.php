<?php
require_once('../pages/layout/header.php');
require_once('../pages/layout/head.php');
require_once("../pages/connexiondb.php");
?>

<body>
    <!--  -->
    <div id="m-booked-weather-bl250-15145">
        <div class="booked-wzs-250-172 weather-customize" style="background-color: #307bd1;width:428px; " id="width3">
            <div class="booked-wzs-250-172_in">
                <div class="booked-wzs-250-172-data">
                    <div class="booked-wzs-250-172-left-img wrz-03"> </div>
                    <div class="booked-wzs-250-172-right">
                        <div class="booked-wzs-day-deck">
                            <div class="booked-wzs-day-val">
                                <div class="booked-wzs-day-number">
                                    <span class="plus">+</span>24
                                </div>
                                <div class="booked-wzs-day-dergee">
                                    <div class="booked-wzs-day-dergee-val">&deg;</div>
                                    <div class="booked-wzs-day-dergee-name">C</div>
                                </div>
                            </div>
                            <div class="booked-wzs-day">
                                <div class="booked-wzs-day-d">H: <span class="plus">+</span>30&deg;</div>
                                <div class="booked-wzs-day-n">L: <span class="plus">+</span>9&deg;</div>
                            </div>
                        </div>
                        <div class="booked-wzs-250-172-info">
                            <div class="booked-wzs-250-172-city smolest-min">Saint-Etienne (Loire) </div>
                            <div class="booked-wzs-250-172-date">Mardi, 14 Juin</div>
                            <div class="booked-wzs-left">
                                <span class="booked-wzs-bottom-l">Prévisions sur 7 jours</span>
                            </div>
                        </div>
                    </div>
                </div>
                <table cellpadding="0" cellspacing="0" class="booked-wzs-table-250">
                    <tr>
                        <td>Mer.</td>
                        <td>Jeu.</td>
                        <td>Ven.</td>
                        <td>Sam.</td>
                        <td>Dim.</td>
                        <td>Lun.</td>
                    </tr>
                    <tr>
                        <td class="week-day-ico">
                            <div class="wrz-sml wrzs-18"></div>
                        </td>
                        <td class="week-day-ico">
                            <div class="wrz-sml wrzs-01"></div>
                        </td>
                        <td class="week-day-ico">
                            <div class="wrz-sml wrzs-03"></div>
                        </td>
                        <td class="week-day-ico">
                            <div class="wrz-sml wrzs-06"></div>
                        </td>
                        <td class="week-day-ico">
                            <div class="wrz-sml wrzs-18"></div>
                        </td>
                        <td class="week-day-ico">
                            <div class="wrz-sml wrzs-01"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="week-day-val"><span class="plus">+</span>33&deg;</td>
                        <td class="week-day-val"><span class="plus">+</span>30&deg;</td>
                        <td class="week-day-val"><span class="plus">+</span>31&deg;</td>
                        <td class="week-day-val"><span class="plus">+</span>33&deg;</td>
                        <td class="week-day-val"><span class="plus">+</span>33&deg;</td>
                        <td class="week-day-val"><span class="plus">+</span>26&deg;</td>
                    </tr>
                    <tr>
                        <td class="week-day-val"><span class="plus">+</span>16&deg;</td>
                        <td class="week-day-val"><span class="plus">+</span>16&deg;</td>
                        <td class="week-day-val"><span class="plus">+</span>15&deg;</td>
                        <td class="week-day-val"><span class="plus">+</span>15&deg;</td>
                        <td class="week-day-val"><span class="plus">+</span>18&deg;</td>
                        <td class="week-day-val"><span class="plus">+</span>14&deg;</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    </div>
    <!-- <h1 class="titre">CHALLENGE HONORAIRE</h1> -->
    <div class="page">

        <div class="clock-outer-body">
            <p class="display-time"></p>
            <p class="cabinet">CHALLENGE HONORAIRE</p>
            <p id="display-date" class="display-date"></p>
            <p id="display-day" class="display-date"></p>
        </div>

        <!-- ****************************************************************************** -->
        <?php
      //preparation de requete
        $requeteCharge = "SELECT  DISTINCT nom,prenom,montant,moisHonoraire, SUM(montant) AS total_honoraire FROM honoraire JOIN chargeclient ON honoraire.idChargeClient = chargeclient.idChargeClient WHERE moisHonoraire = MONTHNAME(date) GROUP BY honoraire.idChargeClient ORDER BY total_honoraire DESC";
        $result = $pdo->query($requeteCharge);
        ?>
        <div class="blockProgress_charge">
            <?php while ($ChargeClientC = $result->fetch()) { ?>
                <div class="img_progess">
                    <div class="progress_charge">
                        <progress value="<?php echo $ChargeClientC['total_honoraire'] ?>" max="100"></progress>
                        <img class="gif" src="https://www.factumarket.com/wp-content/uploads/2017/01/5-Consejos-para-Ganar-m%C3%A1s-y-Ahorrar-en-tu-negocio.gif" alt="gif cabinet labouré">
                    </div>
                    <input type="text" value="<?php echo $ChargeClientC['nom'] ?> <?php echo $ChargeClientC['prenom'] ?>  <?php echo $ChargeClientC['total_honoraire'] ?> €" class="barCharge"> </input>
                </div>
            <?php } ?>
        </div>
        <!-- ****************PODIUM***************************** -->
        <div class="page">
            <ul class="podium">
                <div class="contener">
                    <li class="bronze">
                        <img src="https://www.pngitem.com/pimgs/m/229-2299376_gold-medal-vector-png-transparent-png.png" />
                        <div class="progressPodiom">
                        </div>
                        <input type="text" name="barCharge1" class="barCharge" value="chargé clientèle" data-min="" data-max=""></input>
                    </li>
                </div>
                <!--  -->

                <div class="contener">
                    <li class="gold">
                        <img src="https://www.pngitem.com/pimgs/m/229-2299376_gold-medal-vector-png-transparent-png.png" />
                        <div class="progressPodiom">
                        </div>
                        <input type="text" name="barCharge1" class="barCharge" value="chargé clientèle" data-min="" data-max=""></input>
                    </li>
                </div>
                <!--  -->
                <div class="contener">
                    <li class="silver">
                        <img src="https://www.pngitem.com/pimgs/m/229-2299376_gold-medal-vector-png-transparent-png.png" />
                        <div class="progressPodiom">
                        </div>
                        <input type="text" name="barCharge1" class="barCharge" value="chargé clientèle" data-min="" data-max=""></input>
                    </li>
                </div>
        </div>
    </div>






    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="../js/jsChalleng.js"></script>