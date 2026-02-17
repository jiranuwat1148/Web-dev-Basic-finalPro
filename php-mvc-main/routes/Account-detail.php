<?php
if (isset($_GET['subHis'])) {
    renderView('Account-detail/events-history'); 
} else if (isset($_GET['subEvent'])) {
    renderView('Account-detail/events-history/my-events'); 
} else if (isset($_GET['subProfile'])) {
    renderView('Account-detail/events-history/profile-info'); 
} else if (isset($_GET['subChart'])) {
    renderView('Account-detail/events-history/chart');
}
else{
    renderView('Account-detail');   
}
    

