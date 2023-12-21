<?php
use Microsoft\Graph\GraphServiceClient;
use Microsoft\Kiota\Abstractions\ApiException;
use Microsoft\Kiota\Authentication\Oauth\ClientCredentialContext;

$tokenRequestContext = new ClientCredentialContext(
    'tenantId',
    'clientId',
    'clientSecret'
);
$graphServiceClient = new GraphServiceClient($tokenRequestContext);

try {
    $user = $graphServiceClient->users()->byUserId('[userPrincipalName]')->get()->wait();
    echo "Hello, I am {$user->getGivenName()}";

} catch (ApiException $ex) {
    echo $ex->getError()->getMessage();
}
