{extends file="parent:frontend/register/shipping_fieldset.tpl"}

{block name='frontend_register_shipping_fieldset_input_country'}
        {assign var="shippingCountries" value=""}
        {assign var="index" value="0"}
        {foreach from=$country_list item=country}
            {if $country.attributes.core->get('disableforshipping') != '1'}
                {append var='shippingCountries' value=$country index=$index}
                {$index = $index+1}
            {/if}
        {/foreach}
        {$country_list = $shippingCountries}
    {$smarty.block.parent}
{/block}