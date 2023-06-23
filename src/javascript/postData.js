$('.form__post').submit(function (event) {
    event.preventDefault();

    const formData = new FormData(this);

    let data = {
        id: formData.get('id'),
        email: formData.get('email'),
        name: formData.get('name'),
        gender: formData.get('gender'),
        status: formData.get('status'),
    };

    data = JSON.stringify(data);

    $.ajax({
        url: 'http://localhost:8080/users/create',
        type: 'POST',
        contentType: 'application/json; charset=utf-8',
        data: data,
        success: function (response) {
            console.log('User updated successfully');
            window.location.href = 'http://localhost:8080/users/page/1';
        },
        error: function (xhr, textStatus, error) {
            $('.error').text(xhr.responseText);
            console.error(xhr.statusText);
        }
    });
});