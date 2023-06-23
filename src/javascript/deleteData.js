$('.form__delete').submit(function (event) {
    event.preventDefault();
    let confirmation = confirm('Are you sure you want to delete this user?');
    if (confirmation) {
        const selectedCheckbox = $('.select-id:checked');
        if (selectedCheckbox.length == 0) {
            alert('No users selected. Please select at least 1 user');
        } else {
            selectedCheckbox.each(function () {
                $.ajax({
                    url: `http://localhost:8080/users/${$(this).attr("value")}`,
                    type: 'DELETE',
                    contentType: 'application/json; charset=utf-8',
                    success: function () {
                        console.log('User removed successfully');
                        window.location.href = `http://localhost:8080/users/page/1`;
                    },
                    error: function (error) {
                        console.error(error);
                    }
                });
            });
        }
    } else {
        alert('Action cancelled');
    }
});