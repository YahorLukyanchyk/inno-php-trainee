const selectBox = document.getElementById("selectBox");

if (selectBox) {
    selectBox.addEventListener("change", () => {
        let selectBox = document.getElementById("selectBox");
        let selectItem = selectBox.options[selectBox.selectedIndex].value;

        switch (selectItem) {
            case "rest":
                $.ajax({
                    url: "db",
                    type: "POST",
                    data: {dbType: "remote"},
                    success: function (response) {
                        console.log(response);
                    }
                });
                break;
            default:
                $.ajax({
                    url: "db",
                    type: "POST",
                    data: {dbType: "local"},
                    success: function (response) {
                        console.log(response);
                    }
                });
        }
    })
} else {
    console.log('No DB_Box yet');
}
