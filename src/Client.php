<?php

namespace GenTux\Marketo;


use GenTux\Marketo\Api\AuthApi;
use GenTux\Marketo\Api\CampaignApi;
use GenTux\Marketo\Api\LeadApi;
use GuzzleHttp\Client as Guzzle;

class Client
{
    /** @var string */
    public $url;

    /** @var string */
    public $clientId;

    /** @var string */
    public $clientSecret;

    /** @var string */
    public $accessToken;

    /** @var Guzzle */
    public $guzzle;

    /**
     * Client constructor.
     * @param array $properties
     * @param Guzzle|null $guzzle
     */
    public function __construct(array $properties, Guzzle $guzzle = null)
    {
        $this->url = $properties['api_url'];
        $this->clientId = $properties['client_id'];
        $this->clientSecret = $properties['client_secret'];

        $this->guzzle = $guzzle ?: new Guzzle();
    }

    /**
     * @return LeadApi
     */
    public function leads()
    {
        return new LeadApi($this);
    }

    /**
     * @return AuthApi
     */
    public function auth()
    {
        return new AuthApi($this);
    }

    /**
     * @return CampaignApi
     */
    public function campaign()
    {
        return new CampaignApi($this);
    }

    /**
     * @param $accessToken
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
    }
}