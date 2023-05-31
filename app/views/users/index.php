<?php
$user = $_GET['page'];
$usersPerPage = 3;
$pagesCount = ceil(count($users) / $usersPerPage);
?>

<h1>List of users</h1>
<div class="p-4" style="width: 900px">
    <div class="text-center flex">
        <span class="inline-block w-1/3 font-bold flex items-center gap-4">
            <label for="">Select all</label>
            <input id="select__all" type="checkbox">
        </span>
        <span class="inline-block w-1/3 font-bold">Users</span>
        <span class="inline-block w-1/3 font-bold">Actions</span>
    </div>
    <form class="mb-5" action="users/delete-selected" method="post">
    <?php for ($i = $user * $usersPerPage; $i < ($user + 1) * $usersPerPage; $i++) { ?>
            <?php if (array_key_exists($i, $users)) {?>
                    <div class="border border-y-black border-x-0 py-2 md:flex items-center md:gap-4">
                        <div class="w-1/3"><input type="checkbox" name="selected[<?php echo $users[$i]["id"]?>]"></div>
                        <div class="text-center md:w-1/2"><a href="/user/<?php echo $users[$i]["id"]; ?>"><?php echo $users[$i]["name"]; ?></a></div>
                        <div class="user__controls md:w-1/2">
                            <a class="button" href="/users/edit/<?php echo $users[$i]["id"]; ?>">Edit
                            </a>
                            <button class="button" onclick="deleteData(<?php echo $users[$i]["id"]; ?>)">Delete</button>
                        </div>
                    </div>
            <?php }?>
    <?php } ?>
        <input type="submit" id="submit-form" class="hidden" />
    </form>
    <label class="cursor-pointer bg-red-700 text-white p-2 rounded-md" for="submit-form" tabindex="0">Delete selected</label>
    <div class="text-center">
        <?php for ($i = 0; $i < $pagesCount; $i++) { ?>
            <a href="?page=<?php echo $i ?>"><?php echo $i + 1 ?></a>
        <?php } ?>
    </div>

</div>
<script src="/assets/javascript/deleteData.js"></script>
