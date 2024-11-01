<?php
if (!defined('ABSPATH')) exit;

class Thakur_ProductOptions_Block_Adminhtml_Product_Edit_Tab_CustomOptions {


	public function __construct(){
    add_filter('woocommerce_product_data_tabs', array($this, 'add_product_tab'), 99, 1);	
    add_action('woocommerce_product_data_panels', array($this, 'add_tab_fields'));   
    add_action('woocommerce_process_product_meta', array($this, 'save_options'));		
  }


  public function getAjaxUrl(){ 
    $protocol = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
    return admin_url('admin-ajax.php', $protocol);        
  }  


  public function add_product_tab($tabs){
    $tabs['product_options_for_woocommerce'] = array(
        'label' => __('Software Prices Custom Options', 'product-options-for-woocommerce'),
        'target' => 'pwzrt_product_options_tab',
        'class'  => array(),
        'priority' => 90              
    );
    return $tabs;
  }
  
  
  public function getOptionsBoxHtml(){  
      include_once( Thakur_PO()->getPluginPath() . 'Block/Adminhtml/Product/Edit/Tab/CustomOptions/Options.php');  
      $block = new Thakur_ProductOptions_Block_Adminhtml_Product_Edit_Tab_CustomOptions_Options();
      return $block->toHtml();
  }
  
  
  public function add_tab_fields(){
  
    echo '<div id="pwzrt_product_options_tab" class="panel pwzrt_admin__scope-old" style="display: none;">';
   
    include_once( Thakur_PO()->getPluginPath() . 'view/adminhtml/templates/product/edit/tab/customoptions.php');    

    echo '</div>';
  }

 
  public function save_options($post_id){
    if (isset($_POST['pwzrt_options'])){
      foreach($_POST['pwzrt_options'] as $optionId => $option){
        foreach($option as $fieldName => $field){
          if ($fieldName == 'values'){
            foreach($field as $valueId => $value){
              foreach($value as $vfieldName => $vField){
                $options[$optionId][$fieldName][$valueId][$vfieldName] = sanitize_text_field(stripslashes($vField));        
              }        
            }        
          } else {
           $options[$optionId][$fieldName] = sanitize_text_field(stripslashes($field));
          }
        }     
      }
      
      include_once(Thakur_PO()->getPluginPath() . 'Model/Option.php');		
		  $optionModel = new Thakur_ProductOptions_Model_Option();		  
      $optionModel->saveOptions($post_id, $options);                      
    }
  }


}
