<?php

class ServerErrorController
{
    /**
     * @return void
     */
    public function index(): void
    {
        echo new Response(500, 'application/json');
    }

}