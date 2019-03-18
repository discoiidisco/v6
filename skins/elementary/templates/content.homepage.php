{*
 * CubeCart v6
 * ========================================
 * CubeCart is a registered trade mark of CubeCart Limited
 * Copyright CubeCart Limited 2017. All rights reserved.
 * UK Private Limited Company No. 5323904
 * ========================================
 * Web:   http://www.cubecart.com
 * Email:  sales@cubecart.com
 * License:  GPL-3.0 https://www.gnu.org/licenses/quick-guide-gplv3.html
 *}
{if isset($DOCUMENT)}
<div id="content_homepage">
    {if $DOCUMENT.hide_title==0}<h1>{$DOCUMENT.title}</h1>{/if}
    {$DOCUMENT.content}
</div>
{/if}
{include file='templates/box.popular.php'}
{if $LATEST_PRODUCTS}
<div id="content_latest_products">
   <h2 class="text-center">{$LANG.catalogue.latest_products}</h2>
   <ul>
      {foreach from=$LATEST_PRODUCTS item=product}
      <li>
         <div class="text-center">
            <a href="{$product.url}" title="{$product.name}"><img src="{$product.image}" alt="{$product.name}"></a>
         </div>
         <h3><a href="{$product.url}" title="{$product.name}">{$product.name|truncate:38:"&hellip;"}</a></h3>
         {if $product.review_score && $CTRL_REVIEW}
         <div class="rating"> {for $i = 1; $i <= 5; $i++}
            {if $product.review_score >= $i} <img src="{$STORE_URL}/skins/{$SKIN_FOLDER}/images/star.png" alt=""> {elseif $product.review_score > ($i - 1) && $product.review_score < $i} <img src="{$STORE_URL}/skins/{$SKIN_FOLDER}/images/star_half.png" alt=""> {else} <img src="{$STORE_URL}/skins/{$SKIN_FOLDER}/images/star_off.png" alt=""> {/if}
            {/for} 
         </div>
         {/if}
         {if $product.ctrl_sale}
         <span class="old_price">{$product.price}</span> <span class="sale_price">{$product.sale_price}</span>
         {else}
         {$product.price}
         {/if}
      </li>
      {/foreach}
   </ul>
</div>
{/if}