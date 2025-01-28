<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl7/1L_dstPt3HV5HzF6Gvk/e3s4Wz6iJgD/+ub2oU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            text-align: center;
            background-color: #fff;
            border-radius: 5px;
            padding: 40px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 500px;
        }

        .container h2 {
            margin-top: 0;
            color: #4a4a4a;
        }

        .form-control {
            border: 1px solid #4a4a4a;
            padding: 10px;
            margin-bottom: 20px;
            width: 100%;
            border-radius: 5px;
            resize: vertical;
        }

        .form-control:focus {
            box-shadow: 0px 0px 0px;
            border-color: #4a4a4a;
            outline: 0;
        }

        .btn-primary {
            color: #fff;
            background-color: #4a4a4a;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .btn-primary:hover {
            background-color: #6c63ff;
        }
    </style>
</head>
<body>
    <?php
    if (isset($_GET['intern_id']) && isset($_GET['intern_name'])) {
        $intern_id = $_GET['intern_id'];
        $intern_name = $_GET['intern_name'];
    } else {
        header('Location: liste_accepter.php');
        exit;
    }
    ?>
    <div class="container">
        <h2>Evaluer le stage du <?= htmlspecialchars($intern_name) ?></h2>
        <form action="submitEvaluation.php" method="POST">
            <input type="text" name="intern_id" value="<?= htmlspecialchars($intern_id) ?>" hidden>
            <label for="evaluation">Votre Evaluation:</label>
            <textarea name="evaluation" id="evaluation" class="form-control" rows="5"></textarea>
            <button type="submit" class="btn-primary">Submit Evaluation</button>
        </form>
    </div>
</body>
</html>