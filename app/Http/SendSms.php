<?php
/**
 * Created by IntelliJ IDEA.
 * User: Gaffi
 * Date: 10/19/15
 * Time: 4:13 PM
 */

namespace App\Http;


use SimpleXMLElement;

class SendSms
{

    static public function Test($recepient)
    {

        return $recepient;

    }

    static public function buildMessageXml($recipient, $message)
    {
        $xml = new SimpleXMLElement('<MESSAGES/>');

        $authentication = $xml->addChild('AUTHENTICATION');
        $authentication->addChild('PRODUCTTOKEN', 'e2d419be-b7b2-43bc-a5e0-ce1a04a45025');

        $msg = $xml->addChild('MSG');
        $msg->addChild('FROM', 'KIU-DAR');
        $msg->addChild('TO', $recipient);
        $msg->addChild('BODY', $message);

        return $xml->asXML();
    }

    static public function sendMessage($recipient, $message)
    {
        $xml = self::buildMessageXml($recipient, $message);

        $ch = curl_init(); // cURL v7.18.1+ and OpenSSL 0.9.8j+ are required
        curl_setopt_array($ch, array(
                CURLOPT_URL => 'https://sgw01.cm.nl/gateway.ashx',
                CURLOPT_HTTPHEADER => array('Content-Type: application/xml'),
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $xml,
                CURLOPT_RETURNTRANSFER => true
            )
        );

        $response = curl_exec($ch);

        curl_close($ch);

        return $response;
    }

}