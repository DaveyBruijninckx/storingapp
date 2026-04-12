<?php 
session_start();
require_once __DIR__.'/../../../config/config.php'; 
if (!isset($_SESSION['user_id']))
{
    $msg = "Je moet nog inloggen!";
    header("location: <?php echo $base_url; ?>resources/views/login/index.php?msg=$msg");
    exit;
}
?>
<!doctype html>
<html lang="nl">

<head>
    <title>StoringApp / Meldingen / Nieuw</title>
    <?php require_once __DIR__.'/../components/head.php'; ?>
</head>

<body>

    <?php require_once __DIR__.'/../components/header.php'; ?>

    <div class="container">
        <h1>Nieuwe melding</h1>

        <form action="<?php echo $base_url; ?>/app/Http/Controllers/meldingenController.php" method="POST">

            <div class="form-group">
                <label for="attractie">Naam attractie:</label>
                <input type="text" name="attractie" id="attractie" class="form-input" required>
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <select name="type" id="type" required>
                    <option value="">Kies een optie!</option>
                    <option value="Elektrisch">Elektrisch</option>
                    <option value="Mechanisch">Mechanisch</option>
                    <option value="Software">Software</option>
                </select>               
            </div>
            <div class="form-group">
                <label for="capaciteit">Capaciteit p/uur:</label>
                <input type="number" min="0" name="capaciteit" id="capaciteit" class="form-input" required>
            </div>
            <div class="form-group">
                <label for="melder">Naam melder:</label>
                <input type="text" name="melder" id="melder" class="form-input" required>
            </div>
            <div class="form-group">
                <label for="prioriteit">Prioriteit:</label>
                <input type="checkbox" name="prioriteit" id="prioriteit" class="form-input">
            </div>
            <div class="form-group">
                <label for="overigeInfo">Overige info:</label>
                <input type="text" name="overigeInfo" id="overigeInfo" class="form-input">
            </div>

            <input type="submit" value="Verstuur melding">

        </form>
    </div>

</body>

</html>
