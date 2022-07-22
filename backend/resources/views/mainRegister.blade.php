<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>本会員登録</title>
</head>
<body>
    <form action="/api/register" method="POST">
        @csrf
        <h1>本会員登録画面</h1>
        <p>ユーザー名:<input type="text" name="userName" id="userName" placeholder="6文字以下"></p>
        <input type="hidden" name="mailToken" value="{{ $token }}">
        <input type="hidden" name="mailAddress" value="{{ $address }}">
        <p>新規パスワード：<input type="password" name="password" placeholder="英数字１０文字以下"></p>
        <p>パスワード再確認:<input type="password" name="rePassword" placeholder="パスワード再入力"></p>
        <input type="submit" value="確認" class="btn btn-primary">
    </form>
    @error('userName')
    <p>{{$message}}</p>
    @enderror
    @error('password')
    <p>{{$message}}</p>
    @enderror
    @error('rePassword')
    <p>{{$message}}</p>
    @enderror
    @error('mailToken')
    <p>{{$message}}</p>
    @enderror
</body>
</html>