<?php

use n2305WindowAd\Models\WindowAd;

class Shopware_Controllers_Backend_n2305WindowAd extends \Shopware_Controllers_Backend_Application
{
    protected $model = WindowAd::class;
    protected $alias = 'window_ad';

    protected function getListQuery()
    {
        $builder = parent::getListQuery();

        $builder->leftJoin('window_ad.productStream', 'productStream');
        $builder->addSelect(['productStream']);

        return $builder;
    }

    protected function getDetailQuery($id)
    {
        $builder = parent::getDetailQuery($id);

        $builder->leftJoin('window_ad.productStream', 'productStream');
        $builder->addSelect(['productStream']);

        return $builder;
    }
}
