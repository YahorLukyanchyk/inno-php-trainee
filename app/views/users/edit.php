<div class="wrapper">
    <h1>Edit <?php echo $user['name'] ?> user</h1>
    <form class="user__form from-put">
        <input type="text" name="id" value="<?php echo $user['id'] ?>" hidden="">
        <label for="email">Email:</label>
        <input id="email" type="email" name="email" placeholder="Email" value="<?php echo $user['email'] ?>" required>
        <label for="name">Name:</label>
        <input id="name" type="text" name="name" placeholder="Your first and last name" value="<?php echo $user['name'] ?>" required>
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
        <button class="button" type="submit">Submit changes</button>
    </form>
    <p class="error"></p>
</div>
<script src="/assets/javascript/putData.js"></script>