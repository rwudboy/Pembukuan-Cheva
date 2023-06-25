<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Admin</title>
    <style>
        body {
          font-family: Arial, sans-serif;
          background-color: #f4f4f4;
        }
        
        .container {
          max-width: 400px;
          margin: 0 auto;
          padding: 20px;
          background-color: #fff;
          border: 1px solid #ccc;
          border-radius: 5px;
          margin-top: 100px;
        }
        
        .container h2 {
          text-align: center;
          margin-bottom: 20px;
        }
        
        .container input[type="text"],
        .container input[type="password"] {
          width: 100%;
          padding: 12px 20px;
          margin: 8px 0;
          display: inline-block;
          border: 1px solid #ccc;
          box-sizing: border-box;
          border-radius: 4px;
        }
        
        .container button {
          background-color: #4CAF50;
          color: white;
          padding: 14px 20px;
          margin: 8px 0;
          border: none;
          cursor: pointer;
          width: 100%;
          border-radius: 4px;
        }
        
        .container button:hover {
          background-color: #45a049;
        }
      </style>
    </head>
    <body>
      <div class="container">
        <h2>Register </h2>
        <form action="/registerAdmin" method="post">
            @csrf
            <label for="name_user">Nama:</label>
            <input type="text" id="name_user" name="name_user" placeholder="Enter your username">
            
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter your username">
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password">
            
            <button type="submit" onclick="getUnit()">Register</button>
        </form>
      </div>
    </body>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    function getUnit(){
        $.ajax({
            url:"<?= url("/") ?>/api/units/6",
            method:"POST",
            success:function(data){
                $("#username").val(data.data.nama_unit)
            }
        });
    }
    </script>
    </html>
    