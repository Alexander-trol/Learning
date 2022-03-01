$(document).ready(function(){
    function fetch_user() {
        $.ajax({
            URL:"fetch_user.php",
            method:"POST",
            success:function(data) {
                $('#user_details').html(data);
            }
        })
    }
});