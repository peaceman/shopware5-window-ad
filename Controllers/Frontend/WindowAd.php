<?php

use n2305WindowAd\Models\WindowAd;

class Shopware_Controllers_Frontend_WindowAd extends Enlight_Controller_Action
{
    public function showAction()
    {
        $windowAd = $this->loadWindowAdFromRequest();
        if (is_null($windowAd)) {
            throw new Enlight_Controller_Exception('WindowAd not found', 404);
        }

        $context = $this->container->get('shopware_storefront.context_service')->getShopContext();

        $criteria = $this->container->get('shopware_product_stream.criteria_factory')
            ->createCriteria($this->Request(), $context);

        $this->container->get('shopware_product_stream.repository')->prepareCriteria($criteria, $windowAd->getProductStream()->getId());

        $products = $this->container->get('shopware_search.product_search')->search($criteria, $context);

        $convertedProducts = $this->container->get('legacy_struct_converter')
            ->convertListProductStructList($products->getProducts());

        // sort thumbnails by size
        foreach ($convertedProducts as &$cp) {
            $thumbs = &$cp['image']['thumbnails'];
            $maxWidths = array_column($thumbs, 'maxWidth');

            array_multisort($maxWidths, SORT_ASC | SORT_NUMERIC, $thumbs);
        }

        $this->View()->assign([
            'sArticles' => $convertedProducts,
            'articles' => $convertedProducts,
            'sliderAutoSlide' => 'true',
            'sliderItemMinWidth' => $windowAd->getSliderItemMinWidth(),
            'sliderArrowControls' => 'false',
            'sliderAutoSlideSpeed' => 10,
            'windowAd' => ['title' => $windowAd->getTitle()],
        ]);
    }

    protected function loadWindowAdFromRequest(): ?WindowAd
    {
        $slug = trim((string) $this->request->getParam('ad'));
        if (empty($slug)) return null;

        /** @var \n2305WindowAd\Models\WindowAdRepo $windowAdRepo */
        $windowAdRepo = $this->getModelManager()->getRepository(WindowAd::class);

        return $windowAdRepo->findOneBySlug($slug);
    }
}
