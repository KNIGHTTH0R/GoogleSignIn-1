<?php

  class GoogleAuth extends GoogleAuthConfig{

    protected $client;
    public function __construct(Google_Client $googleClient = null){

      $this->client = $googleClient;
      if($this->client){
        $this->client->setClientId('SAMPLE_CLIENT_ID'); //Replace with your Client ID
        $this->client->setClientSecret('SAMPLE_CLIENT_SECRET'); //Replace with your Client Secret
        $this->client->setRedirectUri('SAMPLE_REDIRECT_URI'); //Replace with Redirect URI exactly as stated in the Dev Console
        $this->client->setScopes('SCOPE'); //email || profile
      }
    }

    public function isLoggedIn(){
      return isset($_SESSION['access_token']);
    }

    public function getAuthUrl(){
      return $this->client->createAuthUrl();
    }

    public function checkRedirectCode(){
        if(isset($_GET['code'])){
          $this->client->authenticate($_GET['code']);
          $this->setToken($this->client->getAccessToken());
          return true;
        }
        return false;
    }
    public function setToken($token){
      $_SESSION['access_token'] = $token;
      $this->client->setAccessToken($token);
    }
    public function logout(){
      unset($_SESSION['access_token']);
    }
    public function getPayload(){
      $payload = $this->client->verifyIdToken();
      return $payload;
    }
  }

 ?>
