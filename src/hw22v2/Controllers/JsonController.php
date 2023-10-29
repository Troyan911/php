<?php

require_once "ContentReader.php";

class JsonController
{
    use ContentReader;

    /**
     * @return void
     * @throws Exception
     */
    public function index(): void
    {
        $data = $this->getData("test.json");
        echo new Response(200, 'application/json', $data);
    }
}