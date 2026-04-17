<!doctype html>
<html lang="nl">

<head>
    <title>StoringApp</title>
    <?php require_once '../components/head.php'; ?>
</head>

<body>

    <?php require_once '../components/header.php'; ?>

    <div class="container home">
        <form action="../../../app/Http/Controllers/registerController.php" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="password">Wachtwoord:</label>
                <input type="password" name="password" id="password">
            </div>
            <div class="form-group">
                <label for="passwordCheck">Voer wachtwoord nog een keer in:</label>
                <input type="password" name="passwordCheck" id="passwordCheck">
            </div>
            <input type="submit" value="Registreer">
        </form>
    </div>

</body>

</html>