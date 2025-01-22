<!DOCTYPE html>
<html lang="fr">

<?php
include_once '../../layouts/head.php'; // Inclusion du fichier d'en-tête
?>


<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <?php
        include_once '../../layouts/nav.php'; // Barre de navigation
        include_once '../../layouts/aside.php'; // Barre latérale
        ?>
        <main class="py-4">
            <div class="content-wrapper">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Liste des Absences</h3>
                    </div>
                    <div class="card-body">
<div class="card-header">
    <h3 class="card-title">Liste des Absences</h3>
    <div class="card-tools">
        <input type="text" id="searchInput" class="form-control" placeholder="Rechercher par nom..." onkeyup="filterTable()">
    </div>
</div>

                        <!-- Table responsive et structurée -->
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Stagiaire</th> <!-- Nom du stagiaire -->
                                        <th>Session</th> <!-- Informations sur la session -->
                                        <th>Date d'Absence</th> <!-- Date de l'absence -->
                                        <th>Statut</th> <!-- Statut de présence -->
                                        <th>Actions</th> <!-- Actions disponibles -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Exemple de ligne -->
                                    <tr>
                                        <td>Mohamed Ali</td>
                                        <td>Seance 1 (9:00 - 11:15)</td>
                                        <td>2025-01-10</td>
                                        <td>Absence</td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <a href="./details.php?id=1" class="btn btn-primary" title="Voir"><i class="fas fa-eye"></i></a>
                                                <a href="./edit.php?id=1" class="btn btn-info" title="Modifier"><i class="fas fa-edit"></i></a>
                                                <a href="#" class="btn btn-danger" onclick="confirmDelete(1)" title="Supprimer"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Zakaria Azizi</td>
                                        <td>Seance 2 (11:35 - 13:50)</td>
                                        <td>2025-01-11</td>
                                        <td>Absence</td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <a href="./details.php?id=1" class="btn btn-primary" title="Voir"><i class="fas fa-eye"></i></a>
                                                <a href="./edit.php?id=1" class="btn btn-info" title="Modifier"><i class="fas fa-edit"></i></a>
                                                <a href="#" class="btn btn-danger" onclick="confirmDelete(1)" title="Supprimer"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Ayoub el bouzekri idrissi</td>
                                        <td>Seance 2 (11:35 - 13:50)</td>
                                        <td>2025-01-15</td>
                                        <td>Absence</td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <a href="./details.php?id=1" class="btn btn-primary" title="Voir"><i class="fas fa-eye"></i></a>
                                                <a href="./edit.php?id=1" class="btn btn-info" title="Modifier"><i class="fas fa-edit"></i></a>
                                                <a href="#" class="btn btn-danger" onclick="confirmDelete(1)" title="Supprimer"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>


                                    <!-- Ajoutez d'autres lignes ici -->
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="card-footer d-flex justify-content-center bg-white">
                        <ul class="pagination m-0">
                        <!-- Pagination controls -->
                        <li class="page-item"><a class="page-link" href="#">«</a></li> <!-- Previous page -->
                        <li class="page-item"><a class="page-link bg-info" href="#">1</a></li> <!-- Page 1 -->
                        <li class="page-item"><a class="page-link" href="#">2</a></li> <!-- Page 2 -->
                        <li class="page-item"><a class="page-link" href="#">3</a></li> <!-- Page 3 -->
                        <li class="page-item"><a class="page-link" href="#">»</a></li> <!-- Next page -->
                        </ul>
                    </div>

                </div>
            </div>
        </main>

        <?php
        include_once '../../layouts/footer.php'; // Inclusion du pied de page
        ?>
    </div>

    <?php
    include_once '../../layouts/script-link.php'; // Inclusion des scripts
    ?>

    <!-- Script pour confirmation de suppression -->
    <script>
        function confirmDelete(id) {
            if (confirm("Êtes-vous sûr de vouloir supprimer cette absence ?")) {
                // Ajoutez la logique pour supprimer l'absence ici
                alert("Absence ID " + id + " supprimée !");
            }
        }
    </script>
</body>

</html>
