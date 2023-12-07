function showPass() {
    var x = document.getElementsByName("oldpassword")[0];
    var y = document.getElementsByName("newpassword")[0];

    if (x.type === "password" && y.type === "password") {
        x.type = "text";
        y.type = "text";
    } else {
        x.type = "password";
        y.type = "password";
    }
}