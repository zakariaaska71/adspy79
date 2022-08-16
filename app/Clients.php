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
$clientId     = 'AYCxGCpG-XDT7HvMKZ7hDGxl3qfg8AT9Xm6MDQa5545gs_O3eQPUtHz-bU-Q3kp9st1mFa9HERI_QUz_';
        $clientSecret = 'EDzvgtTEQ3GX3k42jd8lsxHxpRYB_Aq1rZRG6G4JsXoJLo2GIA4NyJl48raNzAFgmI9Y-FFKVMSSF97w';
        return new OAuthTokenCredential($clientId, $clientSecret);
    }
}