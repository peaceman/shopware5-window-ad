{extends file="frontend/listing/product-box/box-product-slider.tpl"}

{block name='frontend_listing_box_article_image_picture_element'}
    {$srcSet = ''}
    {$srcSetRetina = ''}

    {foreach $sArticle.image.thumbnails as $image}
        {$srcSet = "{if $srcSet}{$srcSet}, {/if}{$image.source} {$image.maxWidth}w"}

        {if $image.retinaSource}
            {$srcSetRetina = "{if $srcSetRetina}{$srcSetRetina}, {/if}{$image.retinaSource} {$image.maxWidth * 2}w"}
        {/if}
    {/foreach}

    <picture>
        <source sizes="{$sliderItemMinWidth}px" srcset="{$srcSetRetina}" media="(min-resolution: 192dpi)" />
        <source sizes="{$sliderItemMinWidth}px" srcset="{$srcSet}" />

        <img src="{$sArticle.image.thumbnails[0].source}" alt="{$desc|strip_tags|truncate:160}" />
    </picture>
{/block}
