<?php
    include_once("../../Layout/blanc-haut.php");

    $pgs = Helper::exec_whith_return_value($db, "select * from ProgrammeFinancement");
?>

<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">

                <h4 class="mt-0 header-title mb-4">List des Programmes de Financement</h4>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Code PG</th>
                            <th>NomP</th>
                            <th>Laprocedure</th>
                            <th>MontantMax</th>
                            <th>Actions</th>
                        </tr>
                    </thead>


                    <tbody>
                        <?php
                            foreach ($pgs as $pg) {
                                echo "<tr>";
                                    echo "<tr><td>" . $pg['CodePg'] . "</td>";
                                    echo "<td>" . $pg['NomP'] . "</td>";
                                    echo "<td>" . $pg['Laprocedure'] . "</td>";
                                    echo "<td>" . $pg['MontantMax'] . "</td>";
                                    echo "<td>
                                            <a href='/views/programme_financement/edit.php?CodePg=" . $pg['CodePg'] . "' class='text-primary'> Modifier </a>
                                        </td>";
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