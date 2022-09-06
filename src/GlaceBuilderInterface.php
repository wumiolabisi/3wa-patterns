<?php

namespace Glace;

interface GlaceBuilderInterface
{
    public function cornet(string $cornet);
    public function parfum(string $parfum);
    public function supl(bool $supl);
    public function forme(bool $forme);

    public function getGlace(): Glace;
}
