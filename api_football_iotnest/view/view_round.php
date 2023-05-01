<?php
include_once '../Foot.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../style/style.min.css" type="text/css" rel="stylesheet" />
    <link rel="icon" type="image/jpg" href="https://explosaotricolor.com.br/wp-content/uploads/2018/10/maxresdefault-678x381.jpg" />
    <title>JOGOS DA 5° RODADA</title>
</head>

<body>
    <?php 
      $connect = new Foot(); 
    ?>
    <center>
        <section class="section">
            <h1 class="title">
                CANPEONATO BRASILEIRO SÉRIE A
            </h1>
        </section>

        <h4 class="title is-4">
           10 JOGOS DA 5° RODADA
        </h4>
        <table class="table is-striped is-narrow">
            <tr>
                <th>CASA</th>
                <th></th>
                <th></th>
                <th>FORA</th>
                <th colspan="3">RESULTADO</th>
            </tr>
            <?php foreach ($connect->viewmatches(BSA, 5)->matches as $match) { ?>
            <tr>
                <td>
                    <figure>
                        <image rel="icon" type="image/png" width="30" height="30" src="<?php echo $match->homeTeam->crest; ?>">&nbsp;<?php echo $match->homeTeam->name; ?>
                    </figure>
                </td>
                <td>-</td>
                <td>&nbsp;</td>
                <td>
                    <figure>
                        <image rel="icon" type="image/png" width="30" height="30" src="<?php echo $match->awayTeam->crest; ?>">&nbsp;<?php echo $match->awayTeam->name; ?>
                    </figure>
                </td>
                <td><?php echo $match->score->fullTime->home;  ?></td>
                <td>:</td>
                <td><?php echo $match->score->fullTime->away;  ?></td>
            </tr>
            <?php } ?>
        </table>
        </section>
</body>

</html>