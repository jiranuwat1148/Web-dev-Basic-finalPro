<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['Decline'])){
        $status = 'Decline';
        $reg_id = $_POST['Decline'];
        updateRegis($reg_id, $status);
        renderView('registation_event',['Event' => $_POST['event_id'] ]);
    }elseif(isset($_POST['confirmed'])){
        $status = 'confirmed';
        $reg_id = $_POST['confirmed'];
        updateRegis($reg_id, $status);
        renderView('registation_event',['Event' => $_POST['event_id'] ]);
    }else{
        
        renderView('registation_event',['Event' => $_POST['event_id'] ]);
    }
}
