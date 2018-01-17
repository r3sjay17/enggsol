<?php 

function theme_setup_styles_and_scripts()
{
 
  	 
    /***
	 * Wilvyrux customized SCSS Sheet
	 *========================================================================*/
	wp_enqueue_style(
		'wilvyrux-injection',
		get_template_directory_uri() .
		'/css/main-custom-injection.css',
		array(),
		'all'
	);   
    
    wp_enqueue_style(
		'google-raleway',
		'https://fonts.googleapis.com/css?family=Raleway:300,400,500,700,800',
		array(),
		'all'
	); 
    
    wp_enqueue_style(
		'google-newcycle',
		'https://fonts.googleapis.com/css?family=News+Cycle:400,700',
		array(),
		'all'
	); 
   
    /*wp_enqueue_style(
		'google-dosis',
		'href="https://fonts.googleapis.com/css?family=Dosis:400,500,600',
		array(),
		'all'
	); */
   
    
    
    
  
//    
       
    /***
	 * FONTAWESOME
	 *========================================================================*/
//	wp_enqueue_style(
//		'fontawesome',
//		'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css',
//		array(),
//		'all'
//	);    
    
    
    
    
    /***
	 * OWSLIDER
	 *========================================================================*/
//	wp_enqueue_style(
//		'owlslider1',
//		'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.0/assets/owl.carousel.min.css',
//		array(),
//		'all'
//	);    
//    
//	wp_enqueue_style(
//		'owlslider2',
//		'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.0/assets/owl.theme.default.min.css',
//		array(),
//		'all'
//	);      
//    
//	wp_enqueue_script(
//		'owlslider3',
//		'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.0/owl.carousel.min.js',
//		array(),
//		'all'
//	);      
    
//    
//    
    
    wp_enqueue_style(
		'bootstrap1',
		'https://cdn.jsdelivr.net/bootstrap/3.3.6/css/bootstrap.css',
		array(),
		'all'
	);  
    
      wp_enqueue_style(
		'bootstrap2',
		'https://cdn.jsdelivr.net/bootstrap/3.3.6/css/bootstrap-theme.css',
		array(),
		'all'
	);    
    
      /*wp_enqueue_script(
		'bootstrap3',
		'https://cdn.jsdelivr.net/bootstrap/3.3.6/js/bootstrap.min.js',
		array(),
		'all'
	); */   
    

}
add_action( 'wp_enqueue_scripts', 'theme_setup_styles_and_scripts', 5000 );


?>