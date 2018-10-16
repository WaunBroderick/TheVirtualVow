<?php

// Get access token via oauth2-yelp library
$provider = new \Stevenmaguire\OAuth2\Client\Provider\Yelp([
    'clientId'          => '{9a_WOFdrS0Hmkk64E7dapw}',
    'clientSecret'      => '{J1LS_z-Jxt9IlsGLmB15PmVGRtWRVUY9oU439WaDDGoUqucRiutBMXfRjEYCt4s26RwI9xbjyhcGjh0HU_NauO-FbDflR8vQZnUDsuI0XU8NFVDs3PPSxgWg_8rDW3Yx}'
]);
$accessToken = (string) $provider->getAccessToken('client_credentials');

// Provide the access token to the yelp-php client
$client = new \Stevenmaguire\Yelp\v3\Client(array(
    'accessToken' => $accessToken,
    'apiHost' => 'api.yelp.com' // Optional, default 'api.yelp.com'
));

?>