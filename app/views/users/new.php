
{% include 'header.php' %}

<h1 class="font-bold p-4">Create new user</h1>
<form class="user__form form__post">
    <label for="email">Email:</label>
    <input id="email"
           class="border border-black border-solid p-1.5 rounded-lg"
           type="email" name="email"
           placeholder="Email"
           required>
    <label for="name">Name:</label>
    <input id="name"
           class="border border-black border-solid p-1.5 rounded-lg"
           type="text"
           name="name"
           placeholder="Your first and last name"
           required>
    <label for="gender">Gender:</label>
    <select id="gender" class="border border-black border-solid p-1.5 rounded-lg" name="gender">
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select>
    <label for="status">Status:</label>
    <select id="status" class="border border-black border-solid p-1.5 rounded-lg" name="status">
        <option value="active">Active user</option>
        <option value="inactive">Inactive user</option>
    </select>
    <button class="button" type="submit">Submit</button>
</form>
<p class="error"></p>

{% include 'footer.php' %}