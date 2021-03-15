{extends file='parent:frontend/index/index.tpl'}

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

            .windowad-fullscreen-slider .product--badge.badge--discount {
                --width: 4rem;
                --aspect-ratio: calc(96 / 153);
                width: var(--width);
                height: calc(var(--width) * var(--aspect-ratio));
            }

            .windowad-fullscreen-slider .product--box .product--price .price--default.is--discount {
                --aspect-ratio: calc(60 / 58);
                --width: 4rem;
                width: var(--width);
                height: calc(var(--width) * var(--aspect-ratio));
            }

            .windowad-fullscreen-title > * {
                width: fit-content;
                margin-left: auto;
                margin-right: auto;
                margin-top: 1.75rem;
                margin-bottom: 0.625rem;
            }

            .windowad-fullscreen-title picture > img {
                width: 10rem;
            }

            @media (orientation: portrait) {
                html {
                    font-size: 2vh;
                }
            }

            @media (orientation: landscape) {
                html {
                    font-size: 1.25vw;
                }
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
                                <picture>
                                    <source srcset="{link file=$theme.desktopLogo}" media="(min-width: 78.75em)">
                                    <source srcset="{link file=$theme.tabletLandscapeLogo}" media="(min-width: 64em)">
                                    <source srcset="{link file=$theme.tabletLogo}" media="(min-width: 48em)">
                                    <img srcset="{link file=$theme.mobileLogo}" alt="{"{config name=shopName}"|escapeHtml} - {$snippetIndexLinkDefault|escape}" />
                                </picture>
                            {/if}
                        {/block}
                    </div>
                </div>
            {/block}

            {block name="windowad_slider_container"}
                {* Slider *}
                <div class="windowad-fullscreen-slider">
                    {include file='frontend/_includes/product_slider.tpl' productBoxLayout='wad'}
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
