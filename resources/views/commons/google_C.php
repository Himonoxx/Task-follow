<?php
$client = new \Google_Client();
        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(env('GOOGLE_REDIRECT_URL'));
        $client->setScopes(explode(',', env('GOOGLE_SCOPES')));
        $client->setApprovalPrompt(env('GOOGLE_APPROVAL_PROMPT'));
 $client->useApplicationDefaultCredentials();  
 
 $client->addScope(\Google_Service_Calendar::CALENDAR);  
 $service = new \Google_Service_Calendar($client);  
 
 
 
 
 ?>