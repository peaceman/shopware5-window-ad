<?php

namespace n2305WindowAd\Models;

use Shopware\Components\Model\ModelRepository;

class WindowAdRepo extends ModelRepository
{
    public function findOneBySlug(string $slug): ?Windowad
    {
        return $this->findOneBy(['urlSlug' => $slug]);
    }
}
