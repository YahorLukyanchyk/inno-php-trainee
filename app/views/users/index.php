<h1>List of users</h1>
<div class="p-4">
    <div class="text-center flex">
        <span class="inline-block w-1/2 font-bold">Users</span>
        <span class="inline-block w-1/2 font-bold">Actions</span>
    </div>
    <?php foreach ($users as $user) { ?>
        <div class="border border-y-black border-x-0 py-2 md:flex items-center md:gap-4">
            <div class="text-center md:w-1/2"><a href="/user/<?php echo $user['id']; ?>"><?php echo $user['name']; ?></a></div>
            <div class="user__controls md:w-1/2">
                <a class="button" href="/users/edit/<?php echo $user['id']; ?>">Edit
                </a>
                <button class="button" onclick="deleteData(<?php echo $user['id']; ?>)">Delete</button>
            </div>
        </div>
    <?php } ?>
</div>
<script src="/assets/javascript/deleteData.js"></script>
