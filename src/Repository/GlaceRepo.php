<?php

namespace App\Repository;

use App\Entity\Glace;
use App\Exception\NoUniqueIdentifiantGlaceException;

class GlaceRepo {
    private array $glaces = [];

    public function add(Glace $glace): void
    {
        $id = $glace->getIdentifiant();

    if (isset($this->glaces[$id])) {
        throw new NoUniqueIdentifiantGlaceException();
    }

        $this->glaces[$id] = $glace;
    }
}
