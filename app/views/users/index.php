<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>All Users</title>
</head>
<body>
<div class="wrapper">
    <h1>List of users</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($users as $user) { ?>
            <tr>
                <td><a href="/user/<?php echo $user['id']; ?>"><?php echo $user['name']; ?></a></td>
                <td>
                    <a class="button" href="/users/edit/<?php echo $user['id']; ?>">Edit
                    </a>
                </td>
                <td>
                    <button class="button" onclick="deleteMethod(<?php echo $user['id']; ?>)">Delete</button>
                </td>
            </tr>
        <?php } ?>
    </table>
   </div>
<script src="/assets/javascript/deleteMethod.js"></script>
</body>
</html>
