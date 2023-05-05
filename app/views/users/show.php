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
        <button class="button" onclick="deleteData(<?php echo $user['id']; ?>)">Delete</button>
    </div>
</div>
<script src="/assets/javascript/deleteData.js"></script>