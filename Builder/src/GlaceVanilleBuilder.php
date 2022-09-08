<?php

namespace Glace;

class GlaceVanilleBuilder implements GlaceBuilderInterface
{

    private $glace;

    public function __construct()
    {
        $this->glace = new GlaceVanille();
    }
    public function cornet(string $cornet)
    {
        $this->glace->setCornet($cornet);
        return $this;
    }
    public function parfum(string $parfum)
    {
        $this->glace->setParfum($parfum);
        return $this;
    }
    public function supl(bool $supl)
    {
        $this->glace->setSuppl($supl);
        return $this;
    }
    public function forme(bool $forme)
    {
        $this->glace->setForme($forme);
        return $this;
    }

    public function getGlace(): Glace
    {
        return $this->glace;
    }
}
