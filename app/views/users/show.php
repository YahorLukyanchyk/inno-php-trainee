<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>User by ID</title>
</head>
<body>
<div class="wrapper">
    <h1><span><?php echo "(" . $user['id'] . ") " ?></span><?php echo $user['name'] ?></h1>
    <div class="user__stats">
        <p>Email: <span><?php echo $user['email'] ?></span></p>
        <p>Gender: <span><?php echo $user['gender'] ?></span></p>
        <p>Status: <span><?php echo $user['status'] ?></span></p>
    </div>
    <div class="user__controls">
        <a class="button" href="/users/edit/<?php echo $user['id']; ?>">Edit
        </a>
        <button class="button" onclick="deleteMethod(<?php echo $user['id']; ?>)">Delete</button>
    </div>
</div>
<script src="/assets/javascript/deleteMethod.js"></script>
</body>
</html>