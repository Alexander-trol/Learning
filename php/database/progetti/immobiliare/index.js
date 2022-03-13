$(document).ready(function() {

    immobiliare_proprietari();
    immobiliare_zone_tipologie();

    function immobiliare_proprietari(){
        $.ajax({
            url:"immobiliare_proprietari.php",
            method:"POST",
            success:function(data){
                $('#imm_prop').html(data);
            }
        })
    }
    function immobiliare_zone_tipologie(){
        $.ajax({
            url:"immobiliare_zone_tipologie.php",
            method:"POST",
            success:function(data){
                $('#tabella').html(data);
            }
        })
    }
});