<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">

    <title><?php print_r($page['title']) ?></title>
</head>
<body>
    <div class="w-full h-full flex flex-col justify-center items-center">
        <?php echo $content ?>
    </div>
</body>
</html>