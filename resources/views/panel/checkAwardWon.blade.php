<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>جزيات جوایز</title>
</head>
<body>
    <form action="" method="post">
        @csrf
        <input type="tel" name="phone">
        <input type="submit" value="برسی">
    </form>

    @isset($info)
    <hr>
        @foreach ($info as $item)
            <b>{{ $item->name }}</b>
            <br>
            @if ($item->status == 1)
                <b>هنوز اهدا نشده</b>
            @endif

            <hr>
        @endforeach
    @endisset
</body>
</html>
