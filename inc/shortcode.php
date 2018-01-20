<?php
function weather_shortcode( $atts, $content = null ) {
    $a = shortcode_atts( array(
        'unit' => 'C',
        'location' => 'Dhaka',
        'height' => '400px',
        'width' => '400px',
    ), $atts );

    $layout_width = $a['width'];
    $layout_height = $a['height'];
    $find_location = $a['location']; ?>

<script type="text/javascript">
      var pass_location = '';
       var pass_location = <?php echo json_encode($find_location); ?>;
</script>

<?php

//    print_r($a);
//    print_r($layout_width);
//    print_r($layout_height);


    $weather_custom_css = "
            .weather-wrap{
            width:{$layout_width};
            max-width: 100%;
            height:{$layout_height};
            }
                            ";
    wp_register_style( 'weather-inline-style', false);
    wp_enqueue_style( 'weather-inline-style' );
    wp_add_inline_style( 'weather-inline-style', $weather_custom_css );

   return ' <div class="weather-wrap">
       
        <i class="fa fa-ellipsis-h pull-right style-fa" aria-hidden="true"></i>
        <div id="settings">
            <ul>
                <li><input type="text" id="city" value=""></li>
                <li><input type="button" id="ajaxCall" class="btn-primary" value="show weather"></li>
            </ul>
        </div>
                   
        <div id="showAjaxData">            
        </div>
        
        <ul id="showFiveDayAjaxData">            
        </ul>
   </div>';
}
add_shortcode( 'show_weather', 'weather_shortcode' );