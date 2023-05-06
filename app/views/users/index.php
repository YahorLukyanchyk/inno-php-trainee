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
                <button class="button" onclick="deleteData(<?php echo $user['id']; ?>)">Delete</button>
            </td>
        </tr>
    <?php } ?>
</table>
<script src="/assets/javascript/deleteData.js"></script>
