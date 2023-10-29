<?php

require_once "ContentReader.php";

class XmlController
{
    use ContentReader;

    /**
     * @return void
     * @throws Exception
     */
    public function index(): void
    {
        $data = $this->getData("test.xml");
        echo new Response(200, 'application/xml', $data);
    }

}