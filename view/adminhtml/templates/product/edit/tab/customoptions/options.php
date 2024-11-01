<?php 
if (!defined('ABSPATH')) exit;
?>
<script id="tmpl-pwzrt-custom-option-base" type="text/html">
    <div class="fieldset-wrapper">
        <div class="fieldset-wrapper-title">   
              <div class="fieldset-wrapper-enabled"> 
              <input id="pwzrt_option_{{{data.id}}}_enabled" name="pwzrt_options[{{{data.id}}}][enabled]" type="checkbox" <# if (data.enabled == 1){ #> checked="checked"<# } #>  value="1"/> <span   > Enabled </span> 
              </div>              
          <div class="actions">             
            
             <button type="button" title="<?php echo __('Delete Custom Option', 'product-options-for-woocommerce') ?>" class="button action-delete pwzrt-delete-option-button">
                  <span><?php echo __('Delete Custom Option', 'product-options-for-woocommerce') ?></span>
              </button>
              
          </div>                  
        </div>    
        <div class="fieldset-wrapper-content" id="pwzrt_option_{{{data.id}}}_content">
          <fieldset class="fieldset">
              <fieldset class="fieldset-alt" id="pwzrt_option_{{{data.id}}}">
                  <input id="pwzrt_option_{{{data.id}}}_is_delete" name="pwzrt_options[{{{data.id}}}][is_delete]" type="hidden" value=""/>
                  <input id="pwzrt_option_{{{data.id}}}_id" name="pwzrt_options[{{{data.id}}}][id]" type="hidden" value="{{{data.id}}}"/>                   
                  <input id="pwzrt_option_{{{data.id}}}_option_id" name="pwzrt_options[{{{data.id}}}][option_id]" type="hidden" value="{{{data.option_id}}}"/>
                  <input id="pwzrt_option_{{{data.id}}}_group" name="pwzrt_options[{{{data.id}}}][group]" type="hidden" value=""/>
                  <div class="field field-option-title">
                      <label class="label" for="pwzrt_option_{{{data.id}}}_title">
                          <?php echo __('Option Title', 'product-options-for-woocommerce') ?>
                      </label>
                      <div class="control">
                          <input type="text" id="pwzrt_option_{{{data.id}}}_title" name="pwzrt_options[{{{data.id}}}][title]" value="{{{data.title}}}" autocomplete="off"/>
                      </div>
                  </div>

                  <div class="field field-option-input-type">
                      <label class="label" for="pwzrt_option_{{{data.id}}}_type">
                          <?php echo __('Input Type', 'product-options-for-woocommerce') ?>
                      </label>
                      <div class="control opt-type">
                        <select name="pwzrt_options[{{{data.id}}}][type]" id="pwzrt_option_{{{data.id}}}_type" class="pwzrt-option-type-select">
                          <option value=""><?php echo esc_html__('-- Please select --', 'product-options-for-woocommerce') ?></option>
                          <optgroup label="<?php echo esc_attr__('Select', 'product-options-for-woocommerce') ?>" data-optgroup-name="select">
                            <option value="drop_down"><?php echo esc_html__('Drop-down', 'product-options-for-woocommerce') ?></option>
                            <option value="radio"><?php echo esc_html__('Radio Buttons', 'product-options-for-woocommerce') ?></option>
                            <option value="checkbox"><?php echo esc_html__('Checkbox', 'product-options-for-woocommerce') ?></option>
                            <option value="multiple"><?php echo esc_html__('Multiple Select', 'product-options-for-woocommerce') ?></option>
                          </optgroup>
                          <optgroup label="<?php echo esc_attr__('Text', 'product-options-for-woocommerce') ?>" data-optgroup-name="text">
                            <option value="field"><?php echo esc_html__('Field', 'product-options-for-woocommerce') ?></option>
                            <option value="area"><?php echo esc_html__('Area', 'product-options-for-woocommerce') ?></option>
                          </optgroup>                          
                        </select>
                      </div>
                  </div>
                  <div class="field field-option-req">
                      <label class="label" for="pwzrt_option_{{{data.id}}}_required">
                          <?php echo __('Required', 'product-options-for-woocommerce')?>
                      </label>          
                      <div class="control">
                          <input id="pwzrt_option_{{{data.id}}}_required" name="pwzrt_options[{{{data.id}}}][required]" type="checkbox" <# if (data.required == 1){ #> checked="checked"<# } #>  value="1"/>
                      </div>
                  </div>
                  <div class="field field-option-req">
                      <label class="label" for="pwzrt_option_{{{data.id}}}_hide_price">
                          <?php echo __('Hide Price', 'product-options-for-woocommerce')?>
                      </label>          
                      <div class="control">
                          <input id="pwzrt_option_{{{data.id}}}_hide_price" name="pwzrt_options[{{{data.id}}}][hide_price]" type="checkbox" <# if (data.hide_price == 1){ #> checked="checked"<# } #>  value="1"/>
                      </div>
                  </div>
                  <div class="field field-option-sort-order">
                      <label class="label" for="pwzrt_option_{{{data.id}}}_sort_order">
                          <?php echo __('Sort Order', 'product-options-for-woocommerce') ?>
                      </label>
                      <div class="control">
                        <input id="pwzrt_option_{{{data.id}}}_sort_order" name="pwzrt_options[{{{data.id}}}][sort_order]" type="text" value="{{{data.sort_order}}}" autocomplete="off"/>
                      </div>
                  </div>  
                                                                                                                                                       
              </fieldset>
          </fieldset>
            
        </div>    
    </div>
</script>
<script id="tmpl-custom-option-select-type" type="text/html">
    <div id="pwzrt_option_{{{data.id}}}_type_select" class="fieldset">
        <table class="data-table">
            <thead>
                <tr>                   
                     <th class="ox-col-sku"><?php echo __('Sort Order', 'product-options-for-woocommerce') ?></th>
                     <th><?php echo __('Title', 'product-options-for-woocommerce') ?></th>
                    <th class="col-price"><?php echo __('Price', 'product-options-for-woocommerce') ?></th>
                                                                                          
                    <th class="col-actions">&nbsp;</th>	      
                </tr>
            </thead>
            <tbody id="pwzrt_select_option_type_row_{{{data.id}}}"></tbody>
            <tfoot>
                <tr>
                    <td colspan="4">
                      <button type="button" class="button pwzrt-add-option-value-button"><?php echo __('Add New Row', 'product-options-for-woocommerce') ?></button>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</script>
<script id="tmpl-custom-option-select-type-row" type="text/html">
    <tr id="pwzrt_option_select_{{{data.vid}}}">       
       
         <td class="ox-col-sort-order">
            <input name="pwzrt_options[{{{data.id}}}][values][{{{data.vid}}}][sort_order]" type="text" value="{{data.sort_order}}" autocomplete="off">
         </td> 
        <td class="select-opt-title">    
            <input name="pwzrt_options[{{{data.id}}}][values][{{{data.vid}}}][value_id]" type="hidden" value="{{{data.value_id}}}">  
            <input id="pwzrt_option_select_{{{data.vid}}}_is_delete" name="pwzrt_options[{{{data.id}}}][values][{{{data.vid}}}][is_delete]" type="hidden" value="">
            <input name="pwzrt_options[{{{data.id}}}][values][{{{data.vid}}}][title]" type="text" value="{{data.title}}" autocomplete="off"/>
        </td>
        <td class="col-price select-opt-price">
            <input name="pwzrt_options[{{{data.id}}}][values][{{{data.vid}}}][price]" type="text" value="{{data.price}}" autocomplete="off">
        </td>                                   
        <td class="col-actions col-delete"> 
          <button type="button" class="button pwzrt-delete-option-value-button" title="<?php echo __('Delete Row', 'product-options-for-woocommerce'); ?>"></button>       
        </td>       
    </tr>
</script>
<script id="tmpl-custom-option-text-type" type="text/html">
    <div id="pwzrt_option_{{{data.id}}}_type_text" class="fieldset">
        <table class="data-table" cellspacing="0">
            <thead>
            <tr>              
                <th class="type-price"><?php echo __('Price', 'product-options-for-woocommerce') ?></th>
            </tr>
            </thead>
            <tr>            
                <td class="opt-price">
                    <input name="pwzrt_options[{{{data.id}}}][price]" type="text" value="{{data.price}}" autocomplete="off">
                </td>
            </tr>
        </table>
    </div>
</script>
<script type="text/javascript">

  var config = {  

  };
  
  var optionData = <?php echo $this->getOptionDataJson(); ?>;
   
  jQuery.extend(config, optionData);
  
  jQuery('#pwzrt_product_options').pwzrtProductOptions(config);    
</script>
