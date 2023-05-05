<div class="wrapper">
    <h1>Create new user</h1>
    <form class="user__form">
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
    <p class="error"></p>
</div>
<script src="/assets/javascript/postData.js"></script>