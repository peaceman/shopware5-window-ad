{extends file='parent:frontend/index/index.tpl'}


{block name="frontend_index_page_wrap"}
    <div class="wad-fullscreen">
        <div style="">
            {* Title *}
            {block name="widget_emotion_component_product_slider_title"}
                {if $windowAd.title}
                    <div class="panel--title is--underline product-slider--title">
                        {$windowAd.title}
                    </div>
                {/if}
            {/block}
        </div>

        {* Slider *}
        <div class="wad-fullscreen-slider">
            {include file='frontend/_includes/product_slider.tpl'}
        </div>
    </div>

    <style type="text/css">
        .wad-fullscreen {
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        .wad-fullscreen-slider {
            flex-grow: 1;
        }

        .wad-fullscreen-slider > .product-slider {
            height: 100%;
        }
    </style>

{/block}
{block name='frontend_index_cookie_permission'}
{/block}

