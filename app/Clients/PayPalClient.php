<?php
namespace App\Clients;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
class PayPalClient
{
    /**
     * Returns PayPal HTTP context instance with environment that has access
     * credentials context. Use this instance to invoke PayPal APIs, provided the
     * credentials have access.
     */
    public function context()
    {
        return new ApiContext($this->credentials());
    }
    /**
     * Set up and return PayPal PHP SDK environment with PayPal access credentials.
     *
     * Paste your client_id and client secret as below
     */
    protected function credentials()
    {
        $clientId     = 'ARCnMdMz_Th2mIBXiHN2V2SMr6Vw05AlJu9O8AvdcwIi82ho--AoXoxuc_aCJDCcNTbvYr4zCPOtjVGM';
        $clientSecret = 'EKlaOItj454mmVVkx5CH3lcGKaYNtalToR_QupOkJTeBUikTCMif1B1sssiDg7NqJYf5C6KwR82iKiwe';
        return new OAuthTokenCredential($clientId, $clientSecret);
    }
}