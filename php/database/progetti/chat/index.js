$(document).ready(function(){

    fetch_user();
    
    setInterval(function () {
        aggiorna_ultima_attivita();
        fetch_user();
        aggiorna_chat()
    }, 1000);
    
    function fetch_user() {
        $.ajax({
            url:"fetch_user.php",
            method:"POST",
            success:function(data) {
                $('#user_details').html(data);
            }
        })
    }
    function aggiorna_ultima_attivita() {
        $.ajax({
            url:"aggiorna_ultima_attivita.php",
            success:function(){

            }
        })
    }
    function chatBox(id_user_r, id_username_r){
        var modal_content = '<div id="user_dialog_'+id_user_r+'" class="user_dialog" title="Stai messaggiando con '+id_username_r+'">';
        modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="cronologia_chat" data-iduserr="'+id_user_r+'" id="cronologia_chat'+id_user_r+'">';
        modal_content += fetch_user_cronologia_chat(id_user_r);
        modal_content += '</div>';
        modal_content += '<div class="form-group">';
        modal_content += '<textarea name="chat_messaggi_'+id_user_r+'" id="chat_messaggi_'+id_user_r+'" class="form-control"></textarea>';
        modal_content += '</div><div class="form-group" align="right">';
        modal_content += '<button type="button" name="send_chat" id="'+id_user_r+'" class="button send_chat">Invia</button></div></div>';
        $('#user_model_details').html(modal_content);
    }
    $(document).on('click', '.start_chat', function (){
        var id_user_r = $(this).data('iduserr');
        var id_username_r = $(this).data('idusernamer');
        chatBox(id_user_r, id_username_r);
        $('#user_dialog_'+id_user_r).dialog({
            
            autoOpen:false,
            width:400
        });
        $('#user_dialog_'+id_user_r).dialog('open');
    })
    $(document).on('click', '.send_chat', function(){
        var id_user_r = $(this).attr('id');
        var chat_messaggi = $('#chat_messaggi_'+id_user_r).val();
        $.ajax({
            url:"invio_messaggi.php",
            method:"POST",
            data:{id_user_r:id_user_r, messaggi:chat_messaggi},
            success:function(data) {
                $('#chat_messaggi_'+id_user_r).val('');
                $('#cronologia_chat'+id_user_r).html(data);
            },
            error:function(data){
                console.log("error");
            }
        })
    });

    function fetch_user_cronologia_chat(id_user_r) {
        $.ajax({
            url:"cronologia_chat.php",
            method:"POST",
            data:{id_user_r:id_user_r},
            success:function(data) {
                $('#cronologia_chat'+id_user_r).html(data);
            }
        })
    }
    function aggiorna_chat() {
        $('.cronologia_chat').each(function() {
           var id_user_r = $(this).data('iduserr'); 
           fetch_user_cronologia_chat(id_user_r);
        });
    }
});