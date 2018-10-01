{extends file="parent:frontend/address/form.tpl"}

{block name='frontend_address_form_input_country'}
    {if $sUserData.additional.user.default_shipping_address_id == $formData.id}
        {assign var="shippingCountries" value=""}
        {assign var="index" value="0"}
        {foreach from=$countryList item=country}
            {if $country.attributes.disableforshipping != '1'}
                {append var='shippingCountries' value=$country index=$index}
                {$index = $index+1}
            {/if}
        {/foreach}
        {$countryList = $shippingCountries}
    {/if}
    {$smarty.block.parent}
{/block}