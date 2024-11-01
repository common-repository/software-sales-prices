<?php
if (!defined('ABSPATH')) exit;
?>
<div class="pwzrt-product-options-wrapper" id="pwzrt_product_options">
  <div class="fieldset">
    <?php foreach($this->getOptions() as $id => $option): ?>  
    <?php   if($option['enabled']=='1'): ?>  
       
    <?php  if($option['hide_price']=='0'){ $formatPrice = $this->formatPrice($option['price']) ; }else { $formatPrice =''; } ?>         
      <div class="field <?php echo $option['required'] == 1 ? 'pwzrt-required' : ''; ?>">
        <label for="select_<?php echo $id; ?>">
          <span><?php echo htmlspecialchars($option['title']);  ?> </span>
          <?php if (($option['type'] == 'field' || $option['type'] == 'area') && $option['price'] != 0): ?>
           <span class="pwzrt-price"><?php echo $formatPrice;?></span> 
          <?php endif; ?>
        </label>
        <div class="control">
          <?php if ($option['type'] == 'radio'): ?>
            <div class="options-list nested">
              <?php if ($option['required'] != 1): ?>
              <div class="choice">
                <input type="radio" name="pwzrt_option[<?php echo $id; ?>]" id="pwzrt_option_[<?php echo $id; ?>]_none_value" class="pwzrt-option" value="">
                <label for="pwzrt_option_[<?php echo $id; ?>]_none_value"><span><?php echo __('None', 'product-options-for-woocommerce') ?></span></label>
              </div>              
              <?php endif; ?>              
              <?php foreach($option['values'] as $vid => $value): ?>  
             <?php  
          if($option['hide_price']=='0'){ $formatPrice = $this->formatPrice($value['price']) ; }else { $formatPrice =''; } ?>               
                <div class="choice">
                  <input type="radio" name="pwzrt_option[<?php echo $id; ?>]" id="pwzrt_option_value_<?php echo $vid; ?>" class="pwzrt-option" value="<?php echo $vid; ?>">
                  <label for="pwzrt_option_value_<?php echo $vid; ?>"><span><?php echo htmlspecialchars($value['title']); ?></span><?php echo $value['price'] != 0 ? '<span class="pwzrt-price"> '. $formatPrice .'</span>' : ''; ?></label>
                </div>
              <?php endforeach; ?>          
            </div>
          <?php elseif ($option['type'] == 'checkbox'): ?>         
            <div class="options-list nested">
              <?php foreach($option['values'] as $vid => $value): ?>   
               <?php  
          if($option['hide_price']=='0'){ $formatPrice = $this->formatPrice($value['price']) ; }else { $formatPrice =''; } ?>               
                <div class="choice">
                  <input type="checkbox" name="pwzrt_option[<?php echo $id; ?>][]" id="pwzrt_option_value_<?php echo $vid; ?>" class="pwzrt-option" value="<?php echo $vid; ?>">
                  <label for="pwzrt_option_value_<?php echo $vid; ?>"><span><?php echo htmlspecialchars($value['title']); ?></span><?php echo $value['price'] != 0 ? '<span class="pwzrt-price"> '. $formatPrice .'</span>' : ''; ?></label>
                </div>
              <?php endforeach; ?>          
            </div>
          <?php elseif ($option['type'] == 'drop_down'): ?>         
            <select name="pwzrt_option[<?php echo $id; ?>]" id="pwzrt_option_<?php echo $id; ?>" class="pwzrt-option">
              <option value=""><?php echo esc_html__('-- please select --', 'product-options-for-woocommerce') ?></option>
              <?php foreach($option['values'] as $vid => $value): ?>  
              <?php  if($option['hide_price']=='0'){ $formatPrice = $this->formatPrice($value['price']) ; }else { $formatPrice =''; } ?>               
                <option value="<?php echo $vid; ?>"><?php echo htmlspecialchars($value['title']) .' '. $formatPrice; ?></option>                   
              <?php endforeach; ?>          
            </select>    
          <?php elseif ($option['type'] == 'multiple'): ?>         
            <select name="pwzrt_option[<?php echo $id; ?>][]" id="pwzrt_option_<?php echo $id; ?>" class="pwzrt-option" multiple="multiple">
              <option value=""><?php echo esc_html__('-- please select --', 'product-options-for-woocommerce') ?></option>
              <?php foreach($option['values'] as $vid => $value): ?>
              <?php  if($option['hide_price']=='0'){ $formatPrice = $this->formatPrice($value['price']) ; }else { $formatPrice =''; } ?>                 
                <option value="<?php echo $vid; ?>"><?php echo htmlspecialchars($value['title']) .' '. $formatPrice; ?></option>                   
              <?php endforeach; ?>          
            </select>   
          <?php elseif ($option['type'] == 'field'): ?>         
            <input type="text" name="pwzrt_option[<?php echo $id; ?>]" id="pwzrt_option_<?php echo $id; ?>" class="pwzrt-option" value="" autocomplete="off">  
          <?php elseif ($option['type'] == 'area'): ?>         
            <textarea name="pwzrt_option[<?php echo $id; ?>]" id="pwzrt_option_<?php echo $id; ?>" class="pwzrt-option" rows="4"></textarea>                                                           
          <?php endif; ?>                                    
        </div>
      </div>
       <?php  endif; ?>
    <?php endforeach; ?>                
  </div>
</div>
<script type="text/javascript">

  var config = {  
    requiredText : "<?php echo __('This field is required.', 'product-options-for-woocommerce'); ?>",
    productId : <?php echo (int) $this->getProductId(); ?>,    
    productPrice : <?php echo (float) $this->getProductPrice(); ?>,
    numberOfDecimals : <?php echo (int) $this->getNumberOfDecimals(); ?>,    
    decimalSeparator : "<?php echo $this->getDecimalSeparator(); ?>",
    thousandSeparator : "<?php echo $this->getThousandSeparator(); ?>",
    currencyPosition : "<?php echo $this->getCurrencyPosition(); ?>",
    isOnSale : <?php echo (int) $this->getIsOnSale(); ?>       
  };
  
  var optionData = <?php echo $this->getOptionDataJson(); ?>;
   
  jQuery.extend(config, optionData);
    
  jQuery('#pwzrt_product_options').pwzrtProductOptions(config);    

</script>