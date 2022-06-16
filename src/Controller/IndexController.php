<?php

namespace App\Controller;

use Abrouter\Client\Client;
use Symfony\Component\HttpFoundation\Response;

class IndexController
{
    public function index(Client $client)
    {
        /**
         * The button color will be changed 50% green/50% red
         */
        $userId = uniqid();
        $buttonColorExperimentAlias = 'button_color';
        $buttonColor = $client
            ->experiments()
            ->run($userId, $buttonColorExperimentAlias)->getBranchId();
        return new Response(json_encode([
            'button_color' => $buttonColor,
        ]));
    }
}
