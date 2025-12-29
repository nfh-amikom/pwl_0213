<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum 8 PWL</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
            color: red;
            margin-top: 40px;
            font-size: 28px;
        }

        .login-container {
            width: 400px; 
            background: white;
            padding: 25px;
            border-radius: 5px;
            margin: 40px auto;
            box-shadow: 0 10px 10px rgba(0,0,0,0.1);
        }

        .login-container h2 {
            margin-bottom: 15px;
            font-size: 18px;
        }

        label {
            font-size: 14px;
            display: block;
            margin-bottom: 4px;
        }

        input[type="text"],
        input[type="password"] {
            box-sizing: border-box;
            -webkit-box-sizing:border-box;
            -moz-box-sizing: border-box;
            width: 100%;
            padding: 8px;
            margin-top: 4px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background: #5cb85c;
            border: none;
            color: white;
            font-size: 15px;
            border-radius: 3px;
            cursor: pointer;
        }

        .btn:hover {
            background: #4cae4c;
        }
    </style>
</head>
<body>
    
    <h1>Selamat Datang di Laravel 12</h1>

    <div class="login-container">
        <h2>Login</h2>

        <label>Username:</label>
        <input type="text">

        <label>Password:</label>
        <input type="password">

        <button class="btn">Login</button>
    </div>

</body>
</html>
