function confirmDelete(id){
    let confirmation = confirm('Are you sure you want to delete this user?');
    if(confirmation){
        window.location.href = `http://localhost/users/${id}/delete`;

    } else {
        alert('nonono');
    }
}