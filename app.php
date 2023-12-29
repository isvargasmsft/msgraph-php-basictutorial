<?php
use Microsoft\Graph\GraphServiceClient;
use Microsoft\Kiota\Abstractions\ApiException;
use Microsoft\Kiota\Authentication\Oauth\ClientCredentialContext;

set_include_path(__DIR__);
require 'vendor/autoload.php';

$tokenRequestContext = new ClientCredentialContext(
    '517c3bf7-db40-48f4-95ef-479526a937bc',
    '7c37e961-b7ce-49ac-a77f-d4cb6a20edb2',
    'Hho8Q~6oRgDK15WDvhJzGVE5KA_m4GGYq4ftmagX'
);
$graphServiceClient = new GraphServiceClient($tokenRequestContext);

try {
    $user = $graphServiceClient->users()->byUserId("AlexW@M365x86781558.OnMicrosoft.com")->get()->wait();
    if ($user != null) {
        echo "Hello, I am {$user->getGivenName()}";
    }
} catch (ApiException $ex) {
    echo $ex->getError()->getMessage();
}
