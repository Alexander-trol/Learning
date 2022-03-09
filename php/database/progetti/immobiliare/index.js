$(document).ready(function(){

    fetch_user();
    
    setInterval(function () {
        fetch_user();
    }, 1000);
    
    function fetch_user() {
        $.ajax({
            url:"tabella.php",
            method:"POST",
            success:function(data) {
                $('#user_details').html(data);
            }
        })
    }
});