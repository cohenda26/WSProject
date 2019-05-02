<?php
// convert object => json
//$json = json_encode($myObject);

// convert json => object
//$obj = json_decode($json);

$tabJson['user'] = $currentUser;
$tabJson['client'] = $currentClient;
$tabJson['courtier'] = $currentCourtier;
$tabJson['locationPage'] = $locationPage;

echo json_encode($tabJson);

?>
