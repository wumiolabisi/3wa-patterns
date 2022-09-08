<?php

namespace Glace;

class Director
{
    private $builder;

    public function __construct(GlaceBuilderInterface $builder)
    {
        $this->builder = $builder;
    }

    public function GlaceVanille_DeOuf()
    {
        return $this->builder->cornet("triangle")
            ->parfum("chocolat")
            ->supl('Amandes caramélisées')
            ->getGlace();
    }
}
