<?php
  require_once 'index.php';

  $period = isset($_GET["period"]) && intval($_GET["period"]) > 2000 ? intval($_GET["period"]) : 5000; 

  $webhook = isset($_GET["webhook"]) ? urldecode($_GET["webhook"]) : "http://$_SERVER[HTTP_HOST]/index.php"; 
?>

<!DOCTYPE html>

<html>
  <head>
    <title>Fake webhook</title>
    <style>
      * {
        font-family: arial;
      }
      
      header {
        border: 1px dashed gray;
        padding: 1em;
        margin-bottom: 1em;
        border-radius: 8px;
      }

      #updates {
        border: 1px dashed black;
        min-height: 100vh;

        padding: 0.5em;
        border-radius: 8px;
      }

      .update {
        font-family: arial;
        padding: 1em 0.5em;
        position: relative;
        margin: 1em 0em;
        background-color: #e89797;
        border: 4px solid #805353;
        border-radius: 8px;
      }

      .update.sent {
        background-color: #87d49d;
        border: 4px solid #538060;
      }

      .update.failed {
        background-color: #f2b374;
        border: 4px solid #bd7f42;
      }

      .update:after {
        content:"recv";
        position:absolute;
        top: -1em;
        left: 0px;
        background-color: #eeeeeecc;
        border-radius: 4px;
        padding: 2px 4px;
      }

      .update.sent:after {
        content:"sent";
      }
      .update.failed:after {
        content:"failed";
      }
    </style>
  </head>
  <body>
    <header>
      Polling ogni <strong><?php echo($period) ?> millisecondi</strong>
    </header>
    <div id="updates">
      
    </div>

    <script>
      let lastUpdateId = null;
      const updateContainer = document.querySelector("#updates");
      setInterval(async ()=>{
        const resp = await (
          await fetch(
          `https://api.telegram.org/bot<?php echo($BOT_ID) ?>/getUpdates`,
          {
            method: "POST",
            headers: {
              'Content-Type': 'application/json',
            },
            body: JSON.stringify({
              offset: lastUpdateId ? lastUpdateId + 1 : undefined,
              limit: 1
            })
          })
        ).json();

        let currentUpdateId = null;
        if(resp.ok && resp.result.length > 0){
          currentUpdateId = resp.result[0].update_id;
        }

        if(currentUpdateId){
          let updateEl = document.querySelector(`#update-${currentUpdateId}`);
          if(!updateEl){
            updateEl = document.createElement("div");
            updateEl.setAttribute("id", `update-${currentUpdateId}`);

            updateEl.classList.add("update");
            updateEl.innerHTML = JSON.stringify(resp);

            updateContainer.prepend(updateEl);
          }

          try{
            const urep = await fetch("<?php echo($webhook) ?>", {
              method: "POST",
              headers: {
                  'Content-Type': 'application/json',
              },
              body: JSON.stringify(resp)
            });

            if(!urep.ok){
              throw new Error(`Status: ${urep.status}`);
            }

            updateEl.classList.remove("failed");
            updateEl.classList.add("sent");
            
            lastUpdateId = currentUpdateId;
          }
          catch(e){
            updateEl.classList.add("failed");
            lastUpdateId = null;
            console.log(e);
          }
        }
      }, <?php echo($period) ?>);
    </script>
  </body>
<html>