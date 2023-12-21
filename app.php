<?php
use Microsoft\Graph\GraphServiceClient;
use Microsoft\Kiota\Abstractions\ApiException;
use Microsoft\Kiota\Authentication\OAuth\ClientCredentialContext;

$tokenRequestContext = new ClientCredentialContext(
    '517c3bf7-db40-48f4-95ef-479526a937bc',
    '5b172565-21f4-4112-b74b-13393688db85',
    'lMC8Q~9r41f5v86MGXftroR9xibTbrm31-T_0bLc'
);
$graphServiceClient = new GraphServiceClient($tokenRequestContext);

try {
    $user = $graphServiceClient->users()->byUserId('AlexW@M365x86781558.OnMicrosoft.com')->get()->wait();
    echo "Hello, I am {$user->getGivenName()}";
} catch (ApiException $ex) {
    echo $ex->getError()->getMessage();
}
