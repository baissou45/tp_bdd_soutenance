<?php
    include_once(__DIR__ . "/Layout/blanc-haut.php");

    $entreprises = Helper::exec_whith_return_value($db, "Select * from Entreprise");
    // print_r($entreprises);
?>


<div class="row ml-3">
    <div id="map" style="height: 80vh" class="col-8"></div>

    <div class="card col-4">
        <div class="card-header">
            <h4 class="my-5"> Liste des entreprises </h4>
        </div>
        <div class="card-body">

            <?php
                foreach ($entreprises as $entreprise) {

                    if ($entreprise['lng'] != null && $entreprise['lat'] != null) {
                        $long = $entreprise['lng'];
                        $lat = $entreprise['lat'];
                        $data = "";
                    } else {
                        $long = -1;
                        $lat = -1;
                        $data = '<span class="text-danger"> (Pas de coordonnées) </span>';
                    }

                    $el = "<div class='form-check form-check-inline mb-3'>";
                    $el .= "<input class='form-check-input' type='radio' onclick='change_local($long, $lat)' name='ent' id='{$entreprise['NomC']}' />";
                    $el .= "<label class='form-check-label' for='{$entreprise['NomC']}'> " . $entreprise['NomC'] . " " . $data . " </label>";
                    $el .= "</div> <br>";

                    echo $el;
                }
            ?>

        </div>
    </div>

</div>





<?php
    include(__DIR__ . "/Layout/blanc-bas.php");
?>

<script>
    var map = L.map('map', {
        center: [43.5618129, 1.3951788,15],
        zoom: 12
    });

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    entreprises = <?php echo json_encode($entreprises); ?>;
    console.log(entreprises);

    entreprises.forEach(ent => {
        console.log(ent['lat']);
        console.log(ent['lng']);

        if (ent['lat'] != null && ent['lng'] != null) {
            L.marker([ent['lng'], ent['lat']]).addTo(map);
        }
    });

    change_local = (long, lat) => {
        console.log(long);
        console.log(lat);

        if (lat != -1 && long != -1) {
            map.setView([long, lat], 15);
        } else {
            map.setView([43.5618129, 1.3951788,15], 12);
        }
    }
</script>
