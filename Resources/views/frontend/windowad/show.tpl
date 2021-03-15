{extends file='parent:frontend/index/index.tpl'}

{* use the largest available thumbnail for the slider *}
{block name='frontend_listing_box_article_image_picture_element'}
    {assign var=bigThumb value=($sArticle.image.thumbnails|@end)}

    <img src="{$bigThumb.sourceSet}"
         alt="{$desc}"
         data-extension="{$sArticle.image.extension}"
         title="{$desc|truncate:160}" />
{/block}

{block name="frontend_index_page_wrap"}
    {block name="windowad_styles"}
        <style type="text/css">
            .windowad-fullscreen {
                display: flex;
                flex-direction: column;
                height: 100vh;
            }

            .windowad-fullscreen-slider {
                flex-grow: 1;
            }

            .windowad-fullscreen-slider > .product-slider,
            .windowad-fullscreen-slider .product--box,
            .windowad-fullscreen-slider .product--info {
                height: 100%;
            }

            .windowad-fullscreen-slider .product--image {
                height: 75%;
            }

            .windowad-fullscreen-slider .product--image .image--element img {
                width: 100%;
                height: 100%;
                object-fit: contain;
            }

            .windowad-fullscreen-title > * {
                width: fit-content;
                margin-left: auto;
                margin-right: auto;
                margin-top: 1.75rem;
                margin-bottom: 0.625rem;
            }
        </style>
    {/block}

    {block name="windowad_page_wrap"}
        <div class="windowad-fullscreen">
            {block name="windowad_title_container"}
                <div class="windowad-fullscreen-title">
                    <div>
                        {block name="widget_emotion_component_product_slider_title"}
                            {if $windowAd.title}
                                <h2>{$windowAd.title}</h2>
                            {else}
                                {include file='frontend/index/logo-container.tpl'}
                            {/if}
                        {/block}
                    </div>
                </div>
            {/block}

            {block name="windowad_slider_container"}
                {* Slider *}
                <div class="windowad-fullscreen-slider">
                    {include file='frontend/_includes/product_slider.tpl'}
                </div>
            {/block}
        </div>
    {/block}
{/block}

{block name='frontend_index_cookie_permission'}
{/block}

{* Support Info *}
{block name='frontend_index_logo_supportinfo'}
{/block}

{* Trusted Shops *}
{block name='frontend_index_logo_trusted_shops'}{/block}
