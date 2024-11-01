<?php 
if (!defined('ABSPATH')) exit;
?>
<div class="fieldset-wrapper">
    <div class="fieldset-wrapper-content" id="pwzrt_product_options">
        <fieldset class="fieldset">
            <div id="pwzrt_product_options_container">
                <div id="pwzrt_product_options_container_top"></div>
            </div>            
            <div class="actions">
              <button type="button" class="button pwzrt-add-option-button"><?php echo __('Add Option', 'product-options-for-woocommerce') ?></button>
            </div>
        </fieldset>       
    </div>
</div>
<?php echo $this->getOptionsBoxHtml() ?>