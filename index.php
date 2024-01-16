<?php
    include_once(__DIR__ . "/Layout/blanc-haut.php");

    $nbr_type = Helper::exec_whith_return_value($db, "SELECT COUNT(TypeAction.codeTA) as nbr FROM TypeAction")[0]['nbr'];
    $nbr_entreprise = Helper::exec_whith_return_value($db, "SELECT COUNT(Entreprise.NomC) as nbr FROM Entreprise")[0]['nbr'];
    $nbr_hst = Helper::exec_whith_return_value($db, "SELECT COUNT(HistoriqueSituation.IdHistorique) as nbr FROM HistoriqueSituation")[0]['nbr'];

    $actions_financer = Helper::exec_whith_return_value($db, "SELECT COUNT(DISTINCT Actions.IdAction) as nbr_act, (SELECT COUNT(DISTINCT Financer.IdAction) FROM Financer) as nbr_act_finnancer FROM Financer, Actions")[0];
    $stat_actions_financer = [
        [
            "label" => "Financer",
            "value" => (double) $actions_financer['nbr_act_finnancer']
        ], [
            "label" => "Non Financer",
            "value" => (double) ($actions_financer['nbr_act'] - $actions_financer['nbr_act_finnancer'])
        ]
    ];

    $evolution_mnt = Helper::exec_whith_return_value($db, "SELECT Year(Financer.DateF) as annee, SUM(Financer.MontantAccorde) as mnt_total, COUNT(Year(Financer.DateF)) as nbr_sub from Financer GROUP by annee ORDER By annee asc;");

    $evolution_ent = Helper::exec_whith_return_value($db, "SELECT HistoriqueSituation.Annee, HistoriqueSituation.NbRecrutement, (HistoriqueSituation.InvestissementActionVertes * 100) / HistoriqueSituation.ChiffreAffaires as pourcentage_invst FROM HistoriqueSituation where HistoriqueSituation.NomC = 'EcoAware'");

    $moyen_recru = 0;
    $moyen_inv = 0;

    foreach ($evolution_ent as $data) {
        $moyen_recru += $data['NbRecrutement'];
        $moyen_inv += $data['pourcentage_invst'];
    }

    $moyen_recru /= count($evolution_ent);
    $moyen_inv /= count($evolution_ent);
?>


<div class="header-bg">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mb-4 pt-5">
                <div id="morris-bar-example" class="dash-chart"></div>

                <div class="mt-4 text-center"> Évolution par année du montant total reçu par les actions subventionnées. </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card text-center m-b-30">
                <div class="mb-2 card-body text-muted">
                    <h3 class="text-info"> <?php echo $nbr_type ?> </h3>
                    Nbr type
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card text-center m-b-30">
                <div class="mb-2 card-body text-muted">
                    <h3 class="text-purple"> <?php echo $actions_financer['nbr_act'] ?> </h3>
                    Nbr Actions
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card text-center m-b-30">
                <div class="mb-2 card-body text-muted">
                    <h3 class="text-primary"> <?php echo $nbr_entreprise ?> </h3>
                    Nbr Entreprise
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card text-center m-b-30">
                <div class="mb-2 card-body text-muted">
                    <h3 class="text-danger"> <?php echo $nbr_hst ?> </h3>
                    Nbr Historique
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">

        <div class="col-xl-4">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Taux d'action financées</h4>

                    <div class="row text-center m-t-20">
                        <div class="col-6">
                            <h5 class=""> <?php echo $actions_financer['nbr_act_finnancer'] ?> </h5>
                            <p class="text-muted font-14">Actions financée</p>
                        </div>
                        <div class="col-6">
                            <h5 class=""> <?php echo $actions_financer['nbr_act'] ?> </h5>
                            <p class="text-muted font-14">Actions total</p>
                        </div>
                    </div>

                    <div id="morris-donut-example" class="dash-chart"></div>
                </div>
            </div>
        </div>

        <div class="col-xl-8">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Évolution du recrutements et de l'investissement vert d'EcoAware</h4>

                    <div class="row text-center m-t-20">
                        <div class="col-4">
                            <h5 class=""> <?php echo count($evolution_ent); ?> ans </h5>
                            <p class="text-muted font-14">Période</p>
                        </div>
                        <div class="col-4">
                            <h5 class=""> <?php echo number_format($moyen_inv, 2, ',', ' '); ?> % </h5>
                            <p class="text-muted font-14">Moy Investissement</p>
                        </div>
                        <div class="col-4">
                            <h5 class=""> <?php echo number_format($moyen_recru, 2, ',', ' '); ?> </h5>
                            <p class="text-muted font-14">Moy recrutement</p>
                        </div>
                    </div>

                    <div id="morris-area-example" class="dash-chart"></div>
                </div>
            </div>
        </div>

    </div>
    <!-- end row -->

</div>

<?php
    include(__DIR__ . "/Layout/blanc-bas.php");
?>

<script>
    var stat_actions_financer = <?php echo json_encode($stat_actions_financer); ?>;
    var evolution_mnt = <?php echo json_encode($evolution_mnt); ?>;
    var evolution_ent = <?php echo json_encode($evolution_ent); ?>;

    console.log(evolution_ent);
</script>
<script src="/stats.js"></script>