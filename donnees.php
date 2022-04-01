<?php
    require 'debut_html.inc.php';
    require 'header_html.inc.php';
?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
<link rel="stylesheet" href="styletable.css">
<main>
    <h1>Bienvenue sur les données !</h1>
    <p class="p-donnees"><br>Ce tableau répertorie une grande partie des téléfilms, films, série et d'autres métrages en lien avec l'univers Marvel.<br> Vous pourrez retrouver leur nom, le type (film, série...) ainsi que la date de sortie, le réalisateur et la durée.</p>
        <div class="table">
        <table id="matable" border="1px">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Type</th>
                    <th>Date</th>
                    <th>Réalisation</th>
                    <th>Durée</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $fichier = './donnees/donnee.json';
                    $tabMarvelJSON = file_get_contents($fichier);
                    $tabMarvelPHP = json_decode($tabMarvelJSON);
                    foreach ($tabMarvelPHP as $key => $value) {
                        echo "<tr>";
                        echo "<td>".$value->Nom."</td>";
                        echo "<td>".$value->Type."</td>";
                        echo "<td>".$value->Date."</td>";
                        echo "<td>".$value->Réalisation."</td>";
                        echo "<td>".$value->Durée."</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
        <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
        <script> type="text/javascript">
            $(document).ready( function () {
            $('#matable').DataTable({language: {url:'https://cdn.datatables.net/plug-ins/1.11.3/i18n/fr_fr.json'}});
            })
        </script>
        </div>
</main>
<?php
    require 'footer_html.inc.php';
    require 'fin_html.inc.php';
?>