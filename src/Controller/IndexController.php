<?php

namespace App\Controller;

use Abrouter\Client\Client;
use Abrouter\Client\Manager\ExperimentManager;
use Symfony\Component\HttpFoundation\Response;

class IndexController
{
    public function index(Client $client)
    {
        /**
         * The button color will be changed 50% green/50% red
         */
        $buttonColorExperimentId = 'D1D06000-0000-0000-00005030';
        return new Response(json_encode([
            'button_color' => $client
                ->experiments()
                ->run(uniqid(), $buttonColorExperimentId)->getBranchId(),
        ]));
    }
}
