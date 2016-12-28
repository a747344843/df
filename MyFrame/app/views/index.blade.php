<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
@foreach($data as $v)
@foreach($v as $val)
    {{dump($val)}}
@endforeach
@endforeach

</body>
</html>