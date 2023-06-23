$('.form__put').submit(function (event) {
    event.preventDefault();

    let formData = new FormData(this);

    let data = {
        id: formData.get('id'),
        email: formData.get('email'),
        name: formData.get('name'),
        gender: formData.get('gender'),
        status: formData.get('status')
    };

    data = JSON.stringify(data);

    $.ajax({
        url: 'http://localhost:8080/users/update',
        type: 'PUT',
        data: data,
        contentType: 'application/json; charset=utf-8',
        success: function (response) {
            console.log('User updated successfully');
            window.location.href = 'http://localhost:8080/users/page/1';
        },
        error: function (xhr, status, error) {
            $('.error').text(xhr.response);
            console.error(xhr.statusText);
        }
    });
});