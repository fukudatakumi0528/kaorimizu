<?php
/**
 * This class handles displaying ads according to amp display conditions
 */
class quads_output_amp_condition_display{            
      private $api_service = null;
    function __construct() {
      if($this->api_service == null){
        require_once QUADS_PLUGIN_DIR . '/admin/includes/rest-api-service.php';
        $this->api_service = new QUADS_Ad_Setup_Api_Service();
      }
  	}
    /**
     * List of all hooks which are used in this class
     */
    public function quads_amp_condition_hooks(){
       // Below the Header 
        //Amp custom theme
        add_action( 'ampforwp_add_loop_class', array($this, 'ampforwp_add_loop_class_above_ad') );
        
        add_action( 'ampforwp_after_header', array($this, 'quads_display_ads_below_the_header') );
        add_action( 'ampforwp_design_1_after_header', array($this, 'quads_display_ads_below_the_header') ); 
        
        //Below the Footer
        add_action( 'amp_post_template_footer', array($this, 'quads_display_ads_below_the_footer') );
        
        //ABove the Footer
        add_action( 'amp_post_template_above_footer', array($this, 'quads_display_ads_above_the_footer') );
        
        //Above the Post Content
        add_action( 'ampforwp_before_post_content', array($this, 'quads_display_ads_above_the_post_content') );
        add_action( 'ampforwp_inside_post_content_before', array($this, 'quads_display_ads_above_the_post_content') );
        
        // Below the Post Content
        add_action( 'ampforwp_after_post_content', array($this, 'quads_display_ads_below_the_post_content') );
        add_action( 'ampforwp_inside_post_content_after', array($this, 'quads_display_ads_below_the_post_content') );
        
        //Below The Title
        add_action('ampforwp_below_the_title',array($this, 'quads_display_ads_below_the_title'));
        
        //Above the Related Post
        add_action('ampforwp_above_related_post',array($this, 'quads_display_ads_above_related_post'));
        
        // Below the Author Box
        add_action( 'ampforwp_below_author_box', array($this, 'quads_display_ads_below_author_box') );
        // In loops
        add_action('ampforwp_between_loop', array($this, 'quads_display_ads_between_loop'),10,1);        
        // Ad After Featured Image #42
        add_action('ampforwp_after_featured_image_hook',array($this, 'quads_display_ads_after_featured_image'));
        
    }
    
    public function quads_display_ads_after_featured_image(){   
        
            $this->quads_amp_condition_ad_code('quads_after_featured_image');   
            
    }
    
    public function quads_display_ads_between_loop($count){                     
                        
      $this->quads_amp_condition_ad_code('quads_ads_in_loops', $count);                
                        
    }    
    
    public function quads_display_ads_below_author_box(){    
        
            $this->quads_amp_condition_ad_code('quads_below_author_box');      
            
    }
    public function quads_display_ads_above_related_post(){ 
        
            $this->quads_amp_condition_ad_code('quads_above_related_post');    
            
    }
    public function quads_display_ads_below_the_title(){ 
        
            $this->quads_amp_condition_ad_code('quads_below_the_title');  
            
    }
    public function quads_display_ads_below_the_post_content(){  
        
            $this->quads_amp_condition_ad_code('quads_below_the_post_content');  
            
    }
    public function quads_display_ads_above_the_post_content(){  
        
            $this->quads_amp_condition_ad_code('quads_above_the_post_content');  
            
    }    
    public function quads_display_ads_above_the_footer(){     
        
            $this->quads_amp_condition_ad_code('quads_above_the_footer');    
            
    }
    
    public function quads_display_ads_below_the_footer(){  
        
            $this->quads_amp_condition_ad_code('quads_below_the_footer');    
            
    }
    
    public function quads_display_ads_below_the_header(){  
        
            $this->quads_amp_condition_ad_code('quads_below_the_header');
            
    }

    /**
     * Here, We are displaying ads or group ads according to amp where to display condition
     * @param type $condition
     * @param type $count
     */
    public function quads_amp_condition_ad_code($condition, $count=null){               
                
        $result = $this->quads_amp_condition_get_ad_code($condition, $count);
        echo $result;
                        
    } 
    public function quads_amp_condition_get_ad_code($condition, $count=null){
      // if (quads_is_amp_endpoint()){
      // return ;
      // }
      $quads_ads = $this->api_service->getAdDataByParam('quads-ads');
      if(isset($quads_ads['posts_data'])){        
        foreach($quads_ads['posts_data'] as $key => $value){
          $ads =$value['post_meta'];
          if($value['post']['post_status']== 'draft'){
            continue;
          }
          if(isset($ads['enabled_on_amp']) && !$ads['enabled_on_amp']){
            continue;
          }
          if($ads['position'] =='amp_after_featured_image' && $condition == 'quads_after_featured_image'){
              $tag= '<!--CusAds'.$ads['ad_id'].'-->'; 
              echo   quads_replace_ads_new( $tag, 'CusAds' . $ads['ad_id'], $ads['ad_id'] );
          }else if($ads['position'] =='amp_below_the_header' && $condition == 'quads_below_the_header'){
            $tag= '<!--CusAds'.$ads['ad_id'].'-->'; 
            echo   quads_replace_ads_new( $tag, 'CusAds' . $ads['ad_id'], $ads['ad_id'] );
          }else if($ads['position'] =='amp_below_the_footer' && $condition == 'quads_below_the_footer'){
            $tag= '<!--CusAds'.$ads['ad_id'].'-->'; 
            echo   quads_replace_ads_new( $tag, 'CusAds' . $ads['ad_id'], $ads['ad_id'] );
          }else if($ads['position'] =='amp_above_the_footer' && $condition == 'quads_above_the_footer'){
            $tag= '<!--CusAds'.$ads['ad_id'].'-->'; 
            echo   quads_replace_ads_new( $tag, 'CusAds' . $ads['ad_id'], $ads['ad_id'] );
          }else if($ads['position'] =='amp_above_the_post_content' && $condition == 'quads_above_the_post_content'){
            $tag= '<!--CusAds'.$ads['ad_id'].'-->'; 
            echo   quads_replace_ads_new( $tag, 'CusAds' . $ads['ad_id'], $ads['ad_id'] );
          }else if($ads['position'] =='amp_below_the_post_content' && $condition == 'quads_below_the_post_content'){
            $tag= '<!--CusAds'.$ads['ad_id'].'-->'; 
            echo   quads_replace_ads_new( $tag, 'CusAds' . $ads['ad_id'], $ads['ad_id'] );
          }else if($ads['position'] =='amp_below_the_title' && $condition == 'quads_below_the_title'){
            $tag= '<!--CusAds'.$ads['ad_id'].'-->'; 
            echo   quads_replace_ads_new( $tag, 'CusAds' . $ads['ad_id'], $ads['ad_id'] );
          }else if($ads['position'] =='amp_above_related_post' && $condition == 'quads_above_related_post'){
            $tag= '<!--CusAds'.$ads['ad_id'].'-->'; 
            echo   quads_replace_ads_new( $tag, 'CusAds' . $ads['ad_id'], $ads['ad_id'] );
          }else if($ads['position'] =='amp_below_author_box' && $condition == 'quads_below_author_box'){
            $tag= '<!--CusAds'.$ads['ad_id'].'-->'; 
            echo   quads_replace_ads_new( $tag, 'CusAds' . $ads['ad_id'], $ads['ad_id'] );
          }else if($ads['position'] =='amp_ads_in_loops' && $condition == 'quads_ads_in_loops'){
            $tag= '<!--CusAds'.$ads['ad_id'].'-->'; 
            $ads_loop_number = (isset($ads['ads_loop_number']) && !empty($ads['ads_loop_number']))? $ads['ads_loop_number'] : 1;
               $ad_code ='';
            $displayed_posts        = get_option('posts_per_page');        
            if(intval($ads_loop_number) == $count){            
                echo   quads_replace_ads_new( $tag, 'CusAds' . $ads['ad_id'], $ads['ad_id'] );
            }   
          }
        }
      }
    }
        
  }
if (class_exists('quads_output_amp_condition_display')) {   
    
        add_action('amp_init', 'quads_amp_hooks_call');
        
        function quads_amp_hooks_call(){
            
            $quads_condition_obj = new quads_output_amp_condition_display;
            $quads_condition_obj->quads_amp_condition_hooks();   
        
        }        	
};
