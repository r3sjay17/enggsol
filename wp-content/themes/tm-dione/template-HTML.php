<?php
/*********************************************
LABEL FOR TEMPLATE
*********************************************/
/**
 * Template Name: TEMPLATE HTML STRUCTURE


*/

get_header();

?>



<!--FROM SERVICES FEATURED BACKGROUND-->
<?php $img_id =  get_post_meta($post->ID,'upload_banner_image',true); ?>
<?php $banner_img = wp_get_attachment_image_url($img_id, 'full'); ?>

<div style="background:url(<?php echo $banner_img; ?>)no-repeat;" class="banner-subpage rty-job-search-page">
    
    <div class="rty-inner-content-holder">
        
        <div class="container">
            
            <div class="col-md-12">

                <?php do_shortcode('[rty_job_search]');?>

                <!--<div class="col-md-12 text-left">
                    <h3>
                        <?php //the_title(); ?>
                    </h3>

                </div>-->

            </div>

        </div>
        
    </div>

</div>




<div class="container">
    <div class="row">
        <!-- starting-->


        <!--        FILTERS & RESULT TEXT-->
        <div id="jobresults-wrapper" class="col-md-12">
            
            <?php echo do_shortcode('[rty_filter]'); ?>
            
            <!--FILTERS-->
            <!--<div id="filter-buttons">
                <div class="col-md-4">
                    <ul>
                        <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> Last 30 Days</a></li>
                        <li><a href="#"><i class="fa fa-list" aria-hidden="true"></i> Show</a></li>
                        <li><a href="#"><i class="fa fa-floppy-o" aria-hidden="true"></i> save jobs</a></li>
                    </ul>
                </div>

                <div class="col-md-8 text-right">
                    <span>
                        <ul>
                            <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i>Save Jobs</a></li>
                            <li><a href="#"><i class="fa fa-print" aria-hidden="true"></i>Print</a></li>
                            <li><a href="#"><i class="fa fa-print" aria-hidden="true"></i>Share</a></li>
                            <li><a href="#"> <i class="fa fa-file-text" aria-hidden="true"></i> View in new tab</a></li>
                        </ul>
                    </span>
                    <span>
                        <ul>
                            <li>View </li>
                            <li> <a href="#"><i class="fa fa-align-left" aria-hidden="true"></i></a> </li>
                            <li> <a href="#"><i class="fa fa-list" aria-hidden="true"></i></a> </li>
                        </ul>
                    </span>
                </div>
            </div>-->

            <!--                JOB CONTENT-->
                    
            <?php echo do_shortcode('[rty_expired_jobs]'); ?>
            
            <div id="jobresult-content-wrapper">
               
                <?php
                    global $zoho_api;
                    $zoho_api->insert_jobs_openings();
                ?>
              
                <div class="col-md-4 rty-jobs-view-holder">
                   
                    <?php echo do_shortcode('[rty_preloader class="rty-spinner-2"]'); ?>
                    
                    <?php echo do_shortcode('[rty_jobs_view]'); ?>
                    
                    <!--<div class="job-lists-wrapper">
                        <div class="jobs">
                            <ul>
                                <li class="text-right"> 
                                    <div class="star-rate"> 
                                        <i class="fa fa-star-o" aria-hidden="true"></i> 
                                        <i class="fa fa-star-o" aria-hidden="true"></i> 
                                    </div> 
                                </li>
                                <li>
                                    <h1>Lorem ipsum dolor sit amet, ad pri hinc minim concludaturque</h1>
                                </li> 
                                <li><i class="fa fa-building" aria-hidden="true"></i>Lorem ipsum dolor sit amet, ad pri hinc minim</li>
                                <li><i class="fa fa-map-marker" aria-hidden="true"></i>Lorem ipsum dolor sit amet, ad pri hinc minim</li>
                                <li><i class="fa fa-clock-o" aria-hidden="true"></i>1 min ago</li>
                                <li class="text-right">S $4k-5k / month</li>
                            </ul>
                        </div>
                        <div class="jobs">
                            <ul>
                                <li>
                                    <h1>Lorem ipsum dolor sit amet, ad pri hinc minim concludaturque</h1>
                                </li> 
                                <li><i class="fa fa-building" aria-hidden="true"></i>Lorem ipsum dolor sit amet, ad pri hinc minim</li>
                                <li><i class="fa fa-map-marker" aria-hidden="true"></i>Lorem ipsum dolor sit amet, ad pri hinc minim</li>
                                <li><i class="fa fa-clock-o" aria-hidden="true"></i>1 min ago</li>
                                <li class="text-right">S $4k-5k / month</li>
                            </ul>
                        </div>
                    </div>-->

                </div>
                
                <div class="col-md-8 rty-jobs-content-holder"> 
                    
                    <?php echo do_shortcode('[rty_preloader class="rty-spinner"]'); ?>
                        
                    <?php echo do_shortcode('[rty_jobs_content]'); ?>
                        
                        <!--<h1 class="job-heading"> Lorem ipsum dolor sit amet, ad pri hinc minim concludaturque </h1>-->
                        
                        <!-- content post -->
                        <!--<div class="content-wrapper">
                            <h3>Our client is a engineering company</h3>
                            
                            <p><strong>Job Responsibilities:</strong></p>
                            <ul>
                                <li>Ei usu maiestatis scripserit. Eu vim dictas volumus explicari.</li>
                                <li>Ei usu maiestatis scripserit. Eu vim dictas volumus explicari.</li>
                                <li>Ei usu maiestatis scripserit. Eu vim dictas volumus explicari.</li>
                                <li>Ei usu maiestatis scripserit. Eu vim dictas volumus explicari.</li>
                            </ul>
                            
                            <p><strong>Job Responsibilities:</strong></p>
                            <ul>
                                <li>Ei usu maiestatis scripserit. Eu vim dictas volumus explicari.</li>
                                <li>Ei usu maiestatis scripserit. Eu vim dictas volumus explicari.</li>
                                <li>Ei usu maiestatis scripserit. Eu vim dictas volumus explicari.</li>
                                <li>Ei usu maiestatis scripserit. Eu vim dictas volumus explicari.</li>
                            </ul>
                            <p>Interested candidates, kindly email your detailed resume in MS Word format to <a href="#">abcdefg@email.com</a></p>
                            
                        </div>-->
                        
                        
                        
<!--                        button apply -->
                        <!--<div class="button-apply-wrapper">
                                <a href="#" class="button-apply">APPLY NOW</a>
                                <div class="small-text">
                                    Enggsol will send your application for reviews directly to
                                    <span>LOREM IPSUM DOLOR SIT AMET AD PRI HINC MINIM CONCLUDATURQUE </span>
                                </div>
                        </div>-->
                        
                        
                        
                            
<!--                        job details    -->
                        <!--<div class="job-details">
                            <ul>
                                <li><strong>Career Level:</strong>Middle</li>
                                <li><strong>strong:</strong>Middle</li>
                                <li><strong>Qualifications:</strong>Middle</li>
                                <li><strong>Industry:</strong>Middle</li>
                                <li><strong>Job Function:</strong>Middle</li>
                                <li><strong>Zonal Segregatio:</strong>Middle</li>
                                <li><strong>Salary:</strong>Middle</li>
                                <li><strong>Employment Type:</strong>Middle</li>
                                <li><strong>Benefits:</strong>Middle</li>
                            </ul>

                            <div class="keywords-job">
                                <span> Keywords: </span>
                                Engineer, Engineering, Project Manager, Manager
                            </div>
                        </div>-->
                        
                        
<!--                        job related-->
                        <!--<div class="job-related-wrapper row">
                            <div class="company-related">
                                <h1 class="related-heading"><strong>More Jobs from this company</strong> </h1>
                                <ul class="col-md-12">
                                    <li class="col-md-4"><a href="#">Lorem ipsum dolor sit amet, ad pri hinc minim concludaturqueno.</a><div class="dates">04 MAR 2017</div></li>
                                    <li class="col-md-4"><a href="#">Lorem ipsum dolor sit amet, ad pri hinc minim concludaturqueno.</a><div class="dates">04 MAR 2017</div></li>
                                    <li class="col-md-4"><a href="#">Lorem ipsum dolor sit amet, ad pri hinc minim concludaturqueno.</a><div class="dates">04 MAR 2017</div></li>
                                </ul>
                            </div>
                            <div class="job-realted">
                                <h1 class="related-heading"><strong>Related Job</strong> </h1>
                                <ul class="col-md-12 clearfix">
                                    <li class="col-md-4"><a href="#">Lorem ipsum dolor sit amet, ad pri hinc minim concludaturqueno.</a><div class="dates">04 MAR 2017</div></li>
                                    <li class="col-md-4"><a href="#">Lorem ipsum dolor sit amet, ad pri hinc minim concludaturqueno.</a><div class="dates">04 MAR 2017</div></li>
                                    <li class="col-md-4"><a href="#">Lorem ipsum dolor sit amet, ad pri hinc minim concludaturqueno.</a><div class="dates">04 MAR 2017</div></li>
                                </ul>
                            </div>
                        </div>-->
                
                </div>
            </div>

            <div class="clearfix"></div>
            
            <?php  echo do_shortcode('[rty_sharer]'); ?>
            
        </div>



        <!-- ending-->
    </div>
</div>

<?php get_footer(); ?>
