{% include 'header.php' %}

<h1 class="font-bold p-4">
    <span>{{ user.id }}</span>
    {{ user.name }}
</h1>
<form class="form__delete flex flex-col items-center">
    <div class="user__stats p-4 mx-2">
        <p><span class="label">Email: </span><span>{{ user.email }}</span></p>
        <p><span class="label">Gender: </span><span>{{ user.gender }}</span></p>
        <p><span class="label">Status: </span><span>{{ user.status }}</span></p>
    </div>
    <div class="user__controls">
        <a class="button" href="/users/edit/{{ user.id }}">Edit
        </a>
        <button class="button">Delete</button>
        <input class="select-id" type="checkbox" value="{{ user.id }}" checked hidden="hidden">
    </div>
</form>

{% include 'footer.php' %}