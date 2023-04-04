<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../styles/style.css">
    <title>Add user</title>
</head>
<body>
<div class="wrapper">
    <h1>Create new user</h1>
    <form class="user__form" method="post" action="/users/create">
        <label for="email">Email:</label>
        <input id="email" type="email" name="email" placeholder="Email" required>
        <label for="name">Name:</label>
        <input id="name" type="text" name="name" placeholder="Your first and last name" required>
        <label for="gender">Gender:</label>
        <select id="gender" name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="active">Active user</option>
            <option value="inactive">Inactive user</option>
        </select>
        <button class="button" type="submit">Submit</button>
    </form>
</div>
</body>
</html>