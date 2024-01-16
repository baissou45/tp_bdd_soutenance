<?php
    include_once("../../../Layout/blanc-haut.php");

    $actions = Helper::exec_whith_return_value($db, "select TypeAction.* from TypeAction, PeutLabelliser where PeutLabelliser.NomC = '{$_GET['NomC']}' and PeutLabelliser.CodeTA = TypeAction.CodeTA");

?>

<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">

                <h4 class="mt-0 header-title mb-4">List des types d'actions pouvant êtres labelisées par <strong><?php echo $_GET['NomC']; ?></strong> </h4>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Code TA</th>
                            <th>Catégorie</th>
                            <th>Descrription</th>
                            <th>Actions</th>
                        </tr>
                    </thead>


                    <tbody>
                        <?php
                            foreach ($actions as $action) {
                                echo "<tr>";
                                    echo "<tr><td>" . $action['codeTA'] . "</td>";
                                    echo "<td>" . $action['Categorie'] . "</td>";
                                    echo "<td>" . $action['Description'] . "</td>";
                                    echo "<td>
                                            <a href='/views/actions_type/edit.php?codeTA=" . $action['codeTA'] . "' class='text-primary'> Modifier </a>
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