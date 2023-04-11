const form = document.querySelector('.from-put');
form.addEventListener('submit', (event) => {
    event.preventDefault();

    const formData = new FormData(form);
    const xhr = new XMLHttpRequest();

    let data = {
        id: formData.get('id'),
        email: formData.get('email'),
        name: formData.get('name'),
        gender: formData.get('gender'),
        status: formData.get('status'),
    }

    data = JSON.stringify(data);

    xhr.open('PUT', 'http://localhost/users/edit');
    xhr.setRequestHeader('Content-type','application/json; charset=utf-8');
    xhr.onload = () => {
        if (xhr.status === 200) {
            window.location.href = 'http://localhost/users';
        } else {
            console.error(xhr.statusText);
        }
    };

    xhr.send(data);
});