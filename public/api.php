<?php
require __DIR__ . '/vendor/autoload.php';

$subDomain = 'jansens-webwinkels';
$apiKey = '1023ihs0edfh';

$apiClient = new Picqer\Api\Client($subDomain, $apiKey);
$apiClient->enableRetryOnRateLimitHit();
$apiClient->setUseragent('My amazing app (dev@example.org)');

foreach ($apiClient->getResultGenerator('order') as $order) {
    var_dump($order);
}