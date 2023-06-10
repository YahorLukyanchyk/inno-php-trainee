$('.form__delete').submit(function (event) {
    event.preventDefault();
    let confirmation = confirm('Are you sure you want to delete this user?');
    if (confirmation) {
        const selectedCheckbox = $('.select-id:checked');
        selectedCheckbox.each(function () {
            $.ajax({
                url: `http://localhost/users/${$(this).attr("value")}`,
                type: 'DELETE',
                contentType: 'application/json; charset=utf-8',
                success: function () {
                    console.log('User removed successfully');
                    window.location.href = `http://localhost/users?page=1&per_page=3`;
                },
                error: function (error) {
                    console.error(error);
                }
            });
        });
    } else {
        alert('Action cancelled');
    }
});