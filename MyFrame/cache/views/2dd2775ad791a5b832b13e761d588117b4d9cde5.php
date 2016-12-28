<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php foreach($data as $v): ?>
<?php foreach($v as $val): ?>
    <?php echo e(dump($val)); ?>

<?php endforeach; ?>
<?php endforeach; ?>

</body>
</html>