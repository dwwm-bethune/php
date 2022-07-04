<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opération</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body>
    <?php
        $number1 = 15;
        $number2 = 5;
        $number3 = 8;

        $result1 = $number1 + $number2 + $number3;
        $result2 = $number1 * ($number2 - $number3);
        $result3 = round(($number3 + $number2) / $number1, 2);
    ?>

    <div class="bg-gray-200 py-4 max-w-lg mx-auto text-center my-4">
        <p><?php echo $number1.' + '.$number2.' + '.$number3.' = '.$result1; ?></p>
        <p><?php echo "$number1 x ($number2 - $number3) = $result2"; ?></p>
        <p><?= "($number3 + $number2) / $number1 = $result3"; ?></p>
    </div>

    <?php if ($result1 < 20 || $result2 < 20 || $result3 < 20) { ?>
        <p class="text-center">Une des opérations renvoie moins de 20</p>
    <?php } ?>
</body>
</html>
