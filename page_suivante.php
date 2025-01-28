<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Détails du Stagiaire</title>
    <style>
        /* Ajoutez votre design ici */
    </style>
</head>
<body>
    <div class="container">
        <h2>Détails du Stagiaire</h2>
        <table id="stagiaire_details">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom et Prénom</th>
                    <th>Email</th>
                    <th>Date Début</th>
                    <th>Date Fin</th>
                    <th>Département</th>
                </tr>
            </thead>
            <tbody> 
            <?php if (isset($_POST['id']) && isset($_POST['nomprenom']) && isset($_POST['email']) && isset($_POST['datedeb']) && isset($_POST['datefin']) && isset($_POST['departement'])): ?>
                <tr>
                    <td><?= htmlspecialchars($_POST['id']) ?></td>
                    <td><?= htmlspecialchars($_POST['nomprenom']) ?></td>
                    <td><?= htmlspecialchars($_POST['email']) ?></td>
                    <td><?= htmlspecialchars($_POST['datedeb']) ?></td>
                    <td><?= htmlspecialchars($_POST['datefin']) ?></td>
                    <td><?= htmlspecialchars($_POST['departement']) ?></td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>