<!DOCTYPE html>
<html lang="fr">
<?php include_once '../../layouts/head.php'; ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<head>
    <style>
        /* Style adjustments for responsiveness and form aesthetics */
        .checkbox-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .form-check-input {
            width: 18px;
            height: 18px;
        }

        .form-check-label {
            font-size: 14px;
            color: #333;
        }

        table {
            width: 100%;
            overflow-x: auto;
            border-collapse: collapse;
        }

        td,
        th {
            padding: 10px;
            text-align: center;
        }

        .remove-row:hover {
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        .animate-row {
            animation: fadeIn 0.3s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <?php
        include_once '../../layouts/nav.php';
        include_once '../../layouts/aside.php';
        ?>
        <main class="py-4">
            <div class="content-wrapper">
                <div class="card card-info">
                    <div class="card-header border-transparent">
                        <h3 class="h3">Créer des Absences</h3>
                    </div>
                    <div class="card-body">
                        <form action="create_absences.php" method="POST" class="container">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Stagiaire</th>
                                            <th>Date de l'absence</th>
                                            <th>Séances</th>
                                            <th>Statut</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="absenceTable">
                                        <tr class="animate-row">
                                            <td>
                                                <select class="form-control" name="trainee[]" required>
                                                    <option value="" selected disabled>Sélectionnez un stagiaire</option>
                                                    <?php
                                                    $trainees = [
                                                        "Zakaria Azizi",
                                                        "Aoulad Amar Samir",
                                                        "Yahya Boussakla",
                                                        "El Bakali Ayoub",
                                                        "SUIRITA Fahd",
                                                        "BOUGTOUB Samia"
                                                    ];
                                                    foreach ($trainees as $id => $name) {
                                                        echo "<option value=\"" . ($id + 1) . "\">$name</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="date" class="form-control" name="date[]" required>
                                            </td>
                                            <td>
                                                <div class="checkbox-container">
                                                    <?php
                                                    for ($i = 1; $i <= 3; $i++) {
                                                        echo '<div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="sessions[0][]" value="' . $i . '">
                                                                <label class="form-check-label">Séance ' . $i . '</label>
                                                              </div>';
                                                    }
                                                    ?>
                                                </div>
                                            </td>
                                            <td>
                                                <select class="form-control" name="status[]" required>
                                                    <option value="" selected disabled>Sélectionnez un statut</option>
                                                    <option value="Absence">Absence</option>
                                                    <option value="Retard">Retard</option>
                                                </select>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm remove-row">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <button type="button" class="btn btn-primary" id="addRow">
                                <i class="fas fa-plus"></i> Ajouter
                            </button>
                            <div class="mt-3">
                                <a href="../dashboard/dashboard.php" class="btn btn-secondary">Annuler</a>
                                <button type="submit" class="btn btn-info float-right">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <?php include_once '../../layouts/footer.php'; ?>
    </div>
    <?php include_once '../../layouts/script-link.php'; ?>
    <script>
        document.getElementById('addRow').addEventListener('click', () => {
            const tableBody = document.getElementById('absenceTable');
            const rowCount = tableBody.rows.length;
            const newRow = `
                <tr class="animate-row">
                    <td>
                        <select class="form-control" name="trainee[]" required>
                            <option value="" selected disabled>Sélectionnez un stagiaire</option>
                            <?php foreach ($trainees as $id => $name) {
                                echo "<option value='" . ($id + 1) . "'>$name</option>";
                            } ?>
                        </select>
                    </td>
                    <td>
                        <input type="date" class="form-control" name="date[]" required>
                    </td>
                    <td>
                        <div class="checkbox-container">
                            <?php
                            for ($i = 1; $i <= 3; $i++) {
                                echo '<div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="sessions[' . '${rowCount}' . '][]" value="' . $i . '">
                                        <label class="form-check-label">Séance ' . $i . '</label>
                                      </div>';
                            }
                            ?>
                        </div>
                    </td>
                    <td>
                        <select class="form-control" name="status[]" required>
                            <option value="" selected disabled>Sélectionnez un statut</option>
                            <option value="Absence">Absence</option>
                            <option value="Retard">Retard</option>
                        </select>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm remove-row">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>`;
            tableBody.insertAdjacentHTML('beforeend', newRow);
        });

        document.addEventListener('click', (e) => {
            if (e.target.closest('.remove-row')) {
                e.target.closest('tr').remove();
            }
        });
    </script>
</body>
</html>
