const form = document.querySelector('.user__form');
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

    xhr.open('POST', `http://localhost/users/create`);
    xhr.setRequestHeader('Content-type','application/json; charset=utf-8');
    xhr.onload = () => {
        if (xhr.status === 200) {
            console.log("User updated successfully");
            window.location.href = 'http://localhost/users?page=0';
        } else {
            document.querySelector(".error").innerText = xhr.response;
            console.error(xhr.statusText);
        }
    };

    xhr.send(data);
});