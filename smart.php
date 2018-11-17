<?php

header('Content-Type: application/json');
function processMessage($update) {
    if($update["result"]["action"] == ""){
        sendMessage(array(
            "source" => $update["result"]["source"],
            "speech" => $update["result"]["parameters"]['echoText'],
            "displayText" => "Hello from webhook",
            "contextOut" => array()
        ));
    }else{
      sendMessage(array(
          "source" => "Sorry !!!",
          "speech" => "Sorry !!!",
          "displayText" => "Hello from webhook",
          "contextOut" => array()
      ));
    }
}

function sendMessage($parameters) {
    echo json_encode($parameters);
}

$update_response = file_get_contents("php://input");
$update = json_decode($update_response, true);
if (isset($update["result"]["action"])) {
    processMessage($update);
}
?>
