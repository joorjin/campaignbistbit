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
            کد : {{ $item->code }}
            <br>
            @if ($item->status == 1)
                <b style="color: #04ff00">هنوز اهدا نشده</b>
                <button onclick="window.location.href='del2m5pon59782dfjkk?phone=<?php echo $item->phone; ?>&id=<?php echo $item->id; ?>'">اهدا شد</button>
            @endif

            @if ($item->status == 0)
            <b style="color: #f00;">اهدا شده</b>
            @endif

            <hr>
        @endforeach
    @endisset


    @isset($del)
    <script>
        alert('به حالت اهدا شده تغییر کرد');
    </script>
@endisset
</body>
</html>
