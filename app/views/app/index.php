
{% include 'header.php' %}

<div class="flex flex-col md:flex-row gap-4 mt-4 p-4 text-center">
    <a class="button" href="/users?page=1&per_page=3">Show all Users</a>
    <a class="button" href="/users/new">Add user</a>
</div>
<div>
    <select name="" id="selectBox">
        <option value="local" selected>Локальная база данных</option>
        <option value="rest">gorest REST API</option>
    </select>
</div>

{% include 'footer.php' %}