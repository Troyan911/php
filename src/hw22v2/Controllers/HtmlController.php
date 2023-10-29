<?php

require_once "ContentReader.php";

class HtmlController
{
    use ContentReader;

    /**
     * @return void
     * @throws Exception
     */
    public function index(): void
    {
        $data = $this->getData("test.html");
        echo new Response(200, 'text/html', $data);
    }

}