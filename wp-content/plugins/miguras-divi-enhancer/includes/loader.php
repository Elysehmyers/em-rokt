<?php

if ( ! class_exists( 'ET_Builder_Element' ) ) {
	return;
}

$module_files = glob( __DIR__ . '/modules/*/*.php' );

$excludedfiles = array('none');

if(null !== get_option('divienhancer-enable-animatedlinks')) {
	if(get_option('divienhancer-enable-animatedlinks') == 'no'){
		array_push($excludedfiles, 'AnimatedLinks');
	}
}

if(null !== get_option('divienhancer-enable-bingmap')) {
	if(get_option('divienhancer-enable-bingmap') == 'no'){
		array_push($excludedfiles, 'bingMap');
	}
}

if(null !== get_option('divienhancer-enable-box')) {
	if(get_option('divienhancer-enable-box') == 'no'){
		array_push($excludedfiles, 'box');
	}
}

if(null !== get_option('divienhancer-enable-carousel')) {
	if(get_option('divienhancer-enable-carousel') == 'no'){
		array_push($excludedfiles, 'carousel');
		array_push($excludedfiles, 'carouselChild');		
	}
}


if(null !== get_option('divienhancer-enable-flipbox')) {
	if(get_option('divienhancer-enable-flipbox') == 'no'){
		array_push($excludedfiles, 'flipBox');
		array_push($excludedfiles, 'flipBoxChild');
	}
}

if(null !== get_option('divienhancer-enable-foodmenu')) {
	if(get_option('divienhancer-enable-foodmenu') == 'no'){
		array_push($excludedfiles, 'foodMenu');
	}
}

if(null !== get_option('divienhancer-enable-ihover')) {
	if(get_option('divienhancer-enable-ihover') == 'no'){
		array_push($excludedfiles, 'iHover');
	}
}

if(null !== get_option('divienhancer-enable-imagecomparison')) {
	if(get_option('divienhancer-enable-imagecomparison') == 'no'){
		array_push($excludedfiles, 'imageComparison');
	}
}

if(null !== get_option('divienhancer-enable-infiniteproducts')) {
	if(get_option('divienhancer-enable-infiniteproducts') == 'no'){
		array_push($excludedfiles, 'infiniteProducts');
	}
}

if(null !== get_option('divienhancer-enable-pricebox')) {
	if(get_option('divienhancer-enable-pricebox') == 'no'){
		array_push($excludedfiles, 'priceBox');
	}
}

if(null !== get_option('divienhancer-enable-shop')) {
	if(get_option('divienhancer-enable-shop') == 'no'){
		array_push($excludedfiles, 'shop');
	}
}

if(null !== get_option('divienhancer-enable-tagcloud')) {
	if(get_option('divienhancer-enable-tagcloud') == 'no'){
		array_push($excludedfiles, 'tagCloud');
		array_push($excludedfiles, 'tagCloudChild');
	}
}

if(null !== get_option('divienhancer-enable-tagproducts')) {
	if(get_option('divienhancer-enable-tagproducts') == 'no'){
		array_push($excludedfiles, 'tagProducts');
	}
}

if(null !== get_option('divienhancer-enable-teammember')) {
	if(get_option('divienhancer-enable-teammember') == 'no'){
		array_push($excludedfiles, 'teamMember');
	}
}

if(null !== get_option('divienhancer-enable-timeline')) {
	if(get_option('divienhancer-enable-timeline') == 'no'){
		array_push($excludedfiles, 'timeLine');
		array_push($excludedfiles, 'timeLineChild');
	}
}




// Load custom Divi Builder modules
foreach ( (array) $module_files as $module_file ) {
	if ( $module_file && preg_match( "/\/modules\/\b([^\/]+)\/\\1\.php$/", $module_file ) ) {

			$included = 'true';
			foreach($excludedfiles as $excluded){
				if (strpos($module_file, $excluded) !== false) {
					$included = 'false';
				}
			}

			if($included == 'true'){
				require_once $module_file;
			}
	}
}
