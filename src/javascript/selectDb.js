$('#selectBox').change(function () {
    let dbType = $(this).val();

    switch (dbType) {
        case 'rest':
            $.ajax({
                url: 'db',
                type: 'POST',
                data: {dbType: 'remote'},
                success: function (response) {
                    console.log(response);
                }
            });
            break;
        default:
            $.ajax({
                url: 'db',
                type: 'POST',
                data: {dbType: 'local'},
                success: function (response) {
                    console.log(response);
                }
            });
    }
});