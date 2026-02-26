<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['Decline'])){
        $status = 'Decline';
        $reg_id = $_POST['Decline'];
        updateRegis($reg_id, $status);
        renderView('registation_event');
    }elseif(isset($_POST['confirmed'])){
        $status = 'confirmed';
        $reg_id = $_POST['confirmed'];
        updateRegis($reg_id, $status);
        renderView('registation_event');
    }
}
else{
    renderView('registation_event');
}