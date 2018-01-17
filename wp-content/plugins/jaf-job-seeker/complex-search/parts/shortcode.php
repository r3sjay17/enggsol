<div class="row">
    <div class="jpb-complex-search">
        <div class="col-md-12">

            <div class="search-filter-wrap">

            </div>
        </div>

        <div class="col-md-12">
            <div class="search-result-main-content">
                <div class="search-top-bar">
                    <?php include 'top-bar.php'; ?>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="job-item-ajax-content">
                        <?php
                        $search_jobs = new WP_Query($serach_args);
                        if($search_jobs->have_posts()): ?>
                        <ul class="result-items">
                            <?php while($search_jobs->have_posts()): $search_jobs->the_post(); $post_id = get_the_ID(); ?>
                            <?php include 'result-item.php'; ?>
                            <?php endwhile; wp_reset_postdata(); ?>
                        </ul>
                        <?php else: ?>
                        <div class="no-results-found">
                            <p>No results found on current criteria.</p>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="job-item-ajax-content"></div>
                </div>
            </div>
        </div>
    </div>
</div>
