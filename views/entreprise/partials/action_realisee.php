<?php
    include_once("../../../Layout/blanc-haut.php");

    $actions = Helper::exec_whith_return_value($db, "select * from actions where NomC = '{$_GET['NomC']}'");
?>

<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">

                <h4 class="mt-0 header-title mb-4">List des actions réalisée par <strong><?php echo $_GET['NomC']; ?></strong> </h4>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Id Action</th>
                            <th>Nom</th>
                            <th>Nbr Likes</th>
                            <th>Nom Compagnie</th>
                            <th>Code Type Action</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            foreach ($actions as $action) {
                                echo "<tr>";
                                    echo "<td>" . $action['IdAction'] . "</td>";
                                    echo "<td>" . $action['NomA'] . "</td>";
                                    echo "<td>" . $action['NbLikes'] . "</td>";
                                    echo "<td>" . $action['NomC'] . "</td>";
                                    echo "<td>" . $action['codeTA'] . "</td>";
                                    echo "<td>
                                            <a href='/views/actions/edit.php?idAction=" . $action['IdAction'] . "' class='text-primary'> Modifier </a>
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
    include("../../../Layout/blanc-bas.php");
?>