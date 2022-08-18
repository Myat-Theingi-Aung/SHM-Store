<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <title>REGISTER</title>
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
    <form action="{{ route('register') }}" method="POST">
    @csrf
        <table>
            <tr>
                <td></td>
                <td><h3>REGISTER</h3></td>
            </tr>
    
            <tr>
                <td><label>Username</label></td>
                <td><input type="text" name="name"></td>
            </tr>

            <tr>
                <td><label>Email</label></td>
                <td><input type="email" name="email"></td>
            </tr>

            <tr>
                <td><label>Password</label></td>
                <td><input type="text" name="password"></td>
            </tr>
    
            <tr>
                <td><label>Password Confirmation</label></td>
                <td><input type="password" name="password_confirmation"></td>
            </tr>
    
            <tr>
                <td></td>
                <td><button type="submit">REGISTER</button></td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <small>
                        <a href="{{ route('login') }}">LOGIN HERE</a>
                    </small>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>



