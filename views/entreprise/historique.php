<?php
    include_once("../../Layout/blanc-haut.php");

    $historiques = Helper::exec_whith_return_value($db, "select * from HistoriqueSituation  where NomC = '{$_GET['NomC']}'");
?>

<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">

                <h4 class="mt-0 header-title mb-4">Historique de l'entreprise <strong><?php echo $_GET['NomC']; ?></strong> </h4>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Annee</th>
                            <th>ChiffreAffaires</th>
                            <th>InvestissementActionVertes</th>
                            <th>NbRecrutement</th>
                            <th>QuantiteCarbone</th>
                        </tr>
                    </thead>


                    <tbody>
                        <?php
                            foreach ($historiques as $ht) {
                                echo "<tr>";
                                    echo "<tr><td>" . $ht['Annee'] . "</td>";
                                    echo "<td>" . $ht['ChiffreAffaires'] . "</td>";
                                    echo "<td>" . $ht['InvestissementActionVertes'] . "</td>";
                                    echo "<td>" . $ht['NbRecrutement'] . "</td>";
                                    echo "<td>" . $ht['QuantiteCarbone'] . "</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

<?php
    include("../../Layout/blanc-bas.php");
?>