<?php
$client = new SoapClient('http://www.soapclient.com/xml/soapresponder.wsdl');
$method = 'Method1';
$arguments = array(
	'bstrParam1'	=> 'Bernardo Albuquerque',
	'bstrParam2'	=> 'https://github.com/bernardomais'
);

$result = $client->__soapCall($method, $arguments);
echo 'Response: ' . $result;
