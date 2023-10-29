<?php

class ClientErrorController
{
    /**
     * @return void
     */
    public function index(): void
    {
        echo new Response(400, 'application/json');
    }

}