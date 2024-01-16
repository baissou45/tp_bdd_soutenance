<?php
    include_once("../../Layout/blanc-haut.php");

    $actions = Helper::exec_whith_return_value($db, "select * from actions");
?>

<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">

                <h4 class="mt-0 header-title mb-4">List des actions</h4>

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
                                echo "<tr><td>" . $action['IdAction'] . "</td>";
                                echo "<td>" . $action['NomA'] . "</td>";
                                echo "<td>" . $action['NbLikes'] . "</td>";
                                echo "<td>" . $action['NomC'] . "</td>";
                                echo "<td>" . $action['codeTA'] . "</td>";
                                echo "<td> voir, modifier, suprimer </td></tr>";
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