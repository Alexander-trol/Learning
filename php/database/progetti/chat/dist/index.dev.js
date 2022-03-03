"use strict";

$(document).ready(function () {
  fetch_user();
  setInterval(function () {
    aggiorna_ultima_attivita();
    fetch_user();
  }, 5000);

  function fetch_user() {
    $.ajax({
      url: "fetch_user.php",
      method: "POST",
      success: function success(data) {
        $('#user_details').html(data);
      }
    });
  }

  function aggiorna_ultima_attivita() {
    $.ajax({
      url: "aggiorna_ultima_attivita.php",
      success: function success() {}
    });
  }

  function chatBox(id_user_r, id_username_r) {
    var modal_content = '<div id="user_dialog_' + id_user_r + '" class="user_dialog" title="Stai messaggiando con ' + id_username_r + '">';
    modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-toiduser="' + to_user_id + '" id="chat_history_' + to_user_id + '">';
    modal_content += '</div>';
    modal_content += '<div class="form-group">';
    modal_content += '<textarea name="chat_message_' + id_user_r + '" id="chat_message_' + id_user_r + '" class="form-control"></textarea>';
    modal_content += '</div><div class="form-group" align="right">';
    modal_content += '<button type="button" name="send_chat" id="' + id_user_r + '" class="btn btn-info send_chat">Invia</button></div></div>';
    $('#user_model_details').html(modal_content);
  }

  $(document).on('click', '.start_chat', function () {
    var id_user_r = $(this).data('iduserr');
    var is_username_r = $(this).data('idusernamer');
    chatBox(id_user_r, id_username_r);
    $('#user_dialog_' + id_user_r).dialog({
      alert: alert,
      autoOpen: false,
      width: 400
    });
    $('#user_dialog_' + id_user_r).dialog('open');
  });
});