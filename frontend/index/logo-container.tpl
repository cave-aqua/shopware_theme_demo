{extends file="parent:frontend/index/logo-container.tpl"}

{block name='frontend_index_logo'}
    {$smarty.block.parent}
    {if $theme.themeSlogan}
        <div class="shop-slogan block" data-message="Hello Shopware!!">
            {$theme.themeSlogan}{* geeft een variable mee vanuit Theme.php *}
        </div>
    {/if}
{/block}