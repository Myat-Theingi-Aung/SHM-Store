<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOGIN</title>
    <!-- CSRF Token -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap');
        body{ font-family: 'Raleway', sans-serif; }
        .mb-0{ margin-bottom: 0; }
        button{ padding: 5px 20px; background-color: transparent; border: 1px solid #1c1e1f; transition: .25s; }
        button:hover{ color: #fff; background-color: #1c1e1f; border:1px solid #fff; }
        table td{ padding: 0 8px; }
    </style>
</head>
<body>
    <form action="{{ route('login') }}" method="POST">
    @csrf
        <table>
            <tr>
                <td></td>
                <td><h3>LOGIN</h3></td>
            </tr>
    
            <tr>
                <td><label>Email</label></td>
                <td><input type="text" name="email"></td>
            </tr>
    
            <tr>
                <td><label>Password</label></td>
                <td><input type="password" name="password"></td>
            </tr>
    
            <tr>
                <td></td>
                <td><button type="submit">LOGIN</button></td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <small>
                        <a href="{{ route('register') }}">REGISTER HERE</a>
                    </small>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>



