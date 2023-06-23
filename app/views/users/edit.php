
{% include 'header.php' %}

<h1 class="font-bold p-4">Edit {{ user.name }} user</h1>
<form class="user__form form__put">
    <input class="border border-black border-solid p-1.5 rounded-lg"
           type="text"
           name="id"
           value="{{ user.id }}"
           hidden="">
    <label for="email">Email:</label>
    <input class="border border-black border-solid p-1.5 rounded-lg"
           id="email"
           type="email" name="email"
           placeholder="Email"
           value="{{ user.email }}"
           required>
    <label for="name">Name:</label>
    <input class="border border-black border-solid p-1.5 rounded-lg"
           id="name"
           type="text" name="name"
           placeholder="Your first and last name"
           value="{{ user.name }}"
           required>
    <label for="gender">Gender:</label>
    <select class="border border-black border-solid p-1.5 rounded-lg" id="gender" name="gender">
        <option value="male" {% if user.gender == 'male' %} selected {% endif %}>Male</option>
        <option value="female" {% if user.gender == 'female' %} selected {% endif %}>Female</option>
    </select>
    <label for="status">Status:</label>
    <select id="status" name="status">
        <option value="active" {% if user.status == 'active' %} selected {% endif %}>Active user</option>
        <option value="inactive" {% if user.status == 'inactive' %} selected {% endif %}>Inactive user</option>
    </select>
    <button class="button" type="submit">Submit changes</button>
</form>
<p class="error"></p>

{% include 'footer.php' %}