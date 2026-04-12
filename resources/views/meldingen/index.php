<?php 
session_start();
require_once __DIR__.'/../../../config/config.php'; 
?>
<!doctype html>
<html lang="nl">

<head>
    <title>StoringApp / Meldingen</title>
    <?php require_once __DIR__.'/../components/head.php'; ?>
    <?php
    if(!isset($_SESSION['user_id']))
    {
        $msg = "Je moet eerst inloggen!";
        header("Location: ../login.php?msg=$msg");
        exit;
    }
    ?>
</head>

<body>
    
    <?php require_once __DIR__.'/../components/header.php'; ?>

    <div class="container">
        <h1>Meldingen</h1>
        <a href="create.php">Nieuwe melding &gt;</a>

        <?php 
        require_once '../../../config/conn.php';
        $query = "SELECT * FROM meldingen";
        $statement = $conn->prepare($query);
        $statement->execute();
        $list = $statement->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <div style="height: 300px; background: #ededed; display: flex; justify-content: center; align-items: center; color: #666666;">
            <table class="meldingen-tabel">
                <thead>
                    <tr>
                        <th>Attractie</th>
                        <th>Capaciteit</th>
                        <th>Melder</th>
                        <th>Type</th>
                        <th>Prioriteit</th>
                        <th>Overige info</th>
                        <th>Aanpassen</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($list as $item): ?>
                    <tr>
                        <td><?php echo $item['attractie']; ?></td>
                        <td><?php echo $item['capaciteit']; ?></td>
                        <td><?php echo $item['melder']; ?></td>
                        <td><?php echo $item['type']; ?></td>
                        <td><?php echo $item['prioriteit']; ?></td>
                        <td><?php echo $item['overige_info']; ?></td>
                        <td><?php echo "<a href='detail.php?id={$item['id']}'>" ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>