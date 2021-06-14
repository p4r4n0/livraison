require('./bootstrap');

$(document).ready(function() {

    $(document).on("click", "#butt", function(){
        alert(1);
        var username = $("#eml").val().trim();
        var password = $("#pwd").val().trim();

        if( username != "" && password != "" ){
            $.post('boo.php', {eml:username, pwd:password}, function(response){ 
              alert("success");
                location.reload();

              $("#content").html(response).show();


            });
        }
    });
    $(document).on("click", "#logout", function(){
        $.post('boo.php', {logout: 'logout'}, function(response){ 
            location.reload();
            $("#content").html(response).show();
        });
    });
});
getContent('*');
function getContent(arg){
    var url = "woo.php";
    $.post(url,{contentVar:arg},function(data){
        $("#content").html(data).show();
    });

}
function getCompte(){
    var url = "boo.php";
    $.post(url,{compte:'compte'},function(data){
        $("#content").html(data).show();
    });
}
function getPage(arg){
    var url = "foo.php";
    $.post(url,{pageID:arg},function(data){
        $("#content").html(data).show();
    });

}