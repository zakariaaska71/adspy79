<?php 
return [ 
    'client_id' => 'ARmz0RlKrAwWiBrpm6DoiIQiU3il8jFepLy51G_SFVPAt-vR05HP-kOGNhYc6ldTPEvJ-LePUP3FVF_I',
	'secret' => 'ECoaKQMkJwy3dEPAwy8I6kIT3vniaUCaytUgZYm9HdGmXcWFv2A4u7FI1RiIQQYkXgB2Q0DmTT_o6gxM',
    'settings' => array(
        'mode' => 'sandbox',
        'http.ConnectionTimeOut' => 1000,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'FINE'
    ),
];