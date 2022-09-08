<?php

use PHPUnit\Framework\TestCase;

class IndexTest extends TestCase
{

    public function testHello()
    {
        $_GET['name'] = 'Fabien';
        /* Verifier que c'est bien le GET->name qui s'affiche */
        ob_start();
        include 'index.php';
        $content = ob_get_clean();
        $this->assertEquals('Hello Fabien', $content);
    }
}
