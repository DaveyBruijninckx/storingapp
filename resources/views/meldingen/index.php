<?php require_once __DIR__.'/../../../config/config.php'; ?>
<!doctype html>
<html lang="nl">

<head>
    <title>StoringApp / Meldingen</title>
    <?php require_once __DIR__.'/../components/head.php'; ?>
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
            <?php foreach($list as $item):?>
            <div>
                <p><?php echo $item['attractie'];?></p>
                <p><?php echo $item['capaciteit'];?></p>
                <p><?php echo $item['melder'];?></p>
                <p><?php echo $item['type'];?></p>
                <p><?php echo $item['prioriteit'];?></p>
                <p><?php echo $item['overige_info'];?></p>  
            </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>

</html>
