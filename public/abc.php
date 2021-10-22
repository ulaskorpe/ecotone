<?php
require('../vendor/picqer/api-client/src/Client.php');

$apiClient = new Picqer\Api\Client('https://fairweb.picqer.com/','I2Tc124Kp0qBvI0glLMUi6souHsMimyh8C2fOk8hk59Rf3qg');
$apiClient->enableRetryOnRateLimitHit();
$apiClient->setUseragent('ECOTONE');


//var_dump($apiClient->getOrders(''));
// Retrieve all orders from Picqer account
