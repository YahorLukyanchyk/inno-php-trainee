<h1 class="font-bold p-4">
    <span><?php echo "(" . $user['id'] . ") " ?></span>
    <?php echo $user['name'] ?>
</h1>
<div class="user__stats p-4 mx-2">
    <p><span class="label">Email: </span><span><?php echo $user['email'] ?></span></p>
    <p><span class="label">Gender: </span><span><?php echo $user['gender'] ?></span></p>
    <p><span class="label">Status: </span><span><?php echo $user['status'] ?></span></p>
</div>
<div class="user__controls">
    <a class="button" href="/users/edit/<?php echo $user['id']; ?>">Edit
    </a>
    <button class="button" onclick="deleteData(<?php echo $user['id']; ?>)">Delete</button>
</div>
<script src="/assets/javascript/deleteData.js"></script>