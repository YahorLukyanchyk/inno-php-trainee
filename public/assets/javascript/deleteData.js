function deleteData(id){
    let confirmation = confirm('Are you sure you want to delete this user?');
    if(confirmation){
        const xhr = new XMLHttpRequest();
        xhr.open('DELETE', `http://localhost/users/${id}`);
        xhr.setRequestHeader('Content-type','application/json; charset=utf-8');
        xhr.onload = () => {
            if (xhr.status === 200) {
                window.location.href = `http://localhost/users`;
            } else {
                console.error(xhr.statusText);
            }
        };
        xhr.send(null);

    } else {
        alert('Action cancelled');
    }
}