<?php
    include_once("../../Layout/blanc-haut.php");

    $actions = Helper::exec_whith_return_value($db, "select * from Entreprise");
?>

<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">

                <h4 class="mt-0 header-title mb-4">List des entreprises</h4>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Ville</th>
                            <th>SiteWeb</th>
                            <th>Secteur</th>
                            <th>Taille_</th>
                            <th>Actions</th>
                        </tr>
                    </thead>


                    <tbody>
                        <?php
                            foreach ($actions as $action) {
                                echo "<tr>";
                                    echo "<tr><td>" . $action['NomC'] . "</td>";
                                    echo "<td>" . $action['Ville'] . "</td>";
                                    echo "<td>" . $action['SiteWeb'] . "</td>";
                                    echo "<td>" . $action['Secteur'] . "</td>";
                                    echo "<td>" . $action['Taille_'] . "</td>";
                                    echo "<td class='d-flex justify-content-around'>
                                            <a href='/views/entreprise/edit.php?NomC=" . $action['NomC'] . "' class='text-primary'> <i class='dripicons-document-edit'></i> Modifier </a>
                                            <a onclick='show_modal' href='/views/entreprise/historique.php?NomC=" . $action['NomC'] . "' class='text-info ml-2'> <i class='dripicons-document-edit'></i> Historique </a>

                                            <div class='btn-group'>
                                                <button type='button' class='btn btn-secondary'>Autre</button>
                                                <button type='button' class='btn btn-secondary dropdown-toggle dropdown-toggle-split' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                    <span class='sr-only'>Toggle Dropdown</span>
                                                </button>
                                                <div class='dropdown-menu'>
                                                    <a class='dropdown-item' href='/views/entreprise/partials/action_realisee.php?NomC=" . $action['NomC'] . "'>Actions Realisée</a>
                                                    <a class='dropdown-item' href='/views/entreprise/partials/action_labelisee.php?NomC=" . $action['NomC'] . "'>Actions Labellisée</a>
                                                    <div class='dropdown-divider'></div>
                                                    <a class='dropdown-item' href='/views/entreprise/partials/peut_labelisee.php?NomC=" . $action['NomC'] . "'>Peut Labelliser</a>
                                                    <a class='dropdown-item' href='/views/entreprise/partials/peut_soutenir.php?NomC=" . $action['NomC'] . "'>Peut soutenir</a>
                                                </div>
                                            </div>
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