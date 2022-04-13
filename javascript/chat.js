//If user submits the form
("#submitmsg").click(function () {
    var clientmsg = $("#usermsg").val();
    $.post("/php/post.php", { text: clientmsg });
    $("#usermsg").val("");
    return false;
});
