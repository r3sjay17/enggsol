<?php
    $location = wp_get_post_terms( $post_id, 'job_locations', array('fields' => 'names') );
$address = get_field('job_meta_location');
    $location = wp_get_post_terms( $post_id, 'job_locations', array('fields' => 'names') );
$address = get_field('job_meta_location');
$salary = 'S$';
?>

<li class="result-item" >
    <div class="item-controls">
        <span class="pull-right"><a href="#"><i class="fa fa-star-o" ></i></a></span>
    </div>
    <h3 class="job-title" ></h3>
    <div class="job-short-info">
        <p class="address"><i class="fa fa-building" aria-hidden="true"></i> <?php echo $address; ?></p>
        <p class="location"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo empty($location) ? '' : implode(', ', $location); ?></p>
        <p class="time-posted"><i class="fa fa-clock" aria-hidden="true"></i> <?php echo $time_posted; ?></p>
        <div class="salary"><span class="" ><?php echo $salary; ?></span></div>
    </div>
</li>
