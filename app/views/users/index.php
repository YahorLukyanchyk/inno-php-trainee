
{% include 'header.php' %}

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
    <form class="mb-5 form__delete">
        {% for user in users|slice((page - 1) * usersPerPage, usersPerPage) %}
                    <div class="border border-y-black border-x-0 py-2 md:flex items-center md:gap-4">
                        <div class="w-1/3">
                            <input class="select-id" type="checkbox" value="{{ user.id }}">
                        </div>
                        <div class="text-center md:w-1/2"><a href="/user/{{ user.id }}">{{ user.name }}</a></div>
                        <div class="user__controls md:w-1/2">
                            <a class="button" href="/users/edit/{{ user.id }}">Edit
                            </a>
                            <label class="button" for="submit-form" tabindex="0">Delete</label>
                        </div>
                    </div>
        {% endfor %}
        <input class="deleteButton" type="submit" id="submit-form" hidden="hidden"/>
    </form>
    <label class="cursor-pointer bg-red-700 text-white p-2 rounded-md" for="submit-form" tabindex="0">Delete selected</label>
    <div class="text-center">
        {% for i in 1..pagesCount %}
        <a href="/users/page/{{ i }}" style="color: {% if i == page %} red {% endif %}">{{ i }}</a>
        {% endfor %}
    </div>
</div>

{% include 'footer.php' %}
