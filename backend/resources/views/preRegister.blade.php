<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>仮会員登録</h1>
    <p>※動作確認用に作った</p>
    <form action="/api/pre-register" method="post">
        @csrf
        <input type="email" name="email">
        <input type="submit" value="送信">
    </form>
</body>
</html>