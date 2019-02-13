<?php
// convert object => json
//$json = json_encode($myObject);

// convert json => object
//$obj = json_decode($json);

function json_encode_private($object) {
    $public = [];
    $reflection = new ReflectionClass($object);
    foreach ($reflection->getProperties() as $property) {
        $property->setAccessible(true);
        $public[$property->getName()] = $property->getValue($object);
    }
    return json_encode($public);
}


$tabJson = [];

//$tabJson['user'] = json_encode($currentUser);
//$tabJson['user'] = method_exists($currentUser, '_toJson') ? $currentUser->_toJson() : json_encode($currentUser);

$tabJson['user'] = $currentUser;
$tabJson['client'] = $currentClient;
$tabJson['courtier'] = $currentCourtier;

echo json_encode($tabJson);

?>
