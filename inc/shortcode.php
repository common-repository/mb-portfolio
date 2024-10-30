<?php 

add_shortcode( 'mb_portfolio', 'mbpg_portfolio_loop_function' );
function mbpg_portfolio_loop_function( $params ) {
    ob_start();
    $val=shortcode_atts(array(
            'navigation'  => 'true',
            'posts'       => 6,
            'term_id'     => 'any',
            'pagination'  => 'true',          

        ), $params);
        $navigation=$val['navigation'];
        $pagination=$val['pagination'];
        $posts_per_page=$val['posts'];
        $portfolio_term=$val['term_id'];
        if ($portfolio_term=='') {
            $portfolio_term='any';
        }
     
     $porfolio_category_terms = get_terms( array(
    'taxonomy' => 'mb-portfolio-category',
    'field'=> 'count',
    'hide_empty' => false,
     ));
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $query = new WP_Query( array(
        'post_type'         => 'mb-portfolio',
        'posts_per_page'    => $posts_per_page,
        'tax_query' => array(
        array (
            'taxonomy' => 'mb-portfolio-category',
            'field' => 'term_id',
            'terms' => $portfolio_term,
            )
        ),

        'order'     => 'DESC',
        'paged'     => $paged,

    ) );

    if ( $query->have_posts() ) { ?>
    <section id="portfolio" class="mbsection">
        <div class="mbcontainer-fluid">
            <?php if ($navigation=='true') { ?>
            <div class="mbcontainer">
                <div class="mbrow navRow"><!-- navRow -->
                    <div class="mbcol-md-12 mbcol-sm-12 mbcol-xs-12">
                        <!-- portfolio Nav -->
                        <div class="portfolio-nav">
                            <ul>
                                <li class="mbactive" data-filter="*"><i class="fa fa-tasks"></i>All Works</li>
                                <?php 
                                foreach($porfolio_category_terms as $catTerm)
                                    {
                                        $font_class = get_term_meta( $catTerm->term_id, 'mb-font-class', true );
                                        $term_count = $catTerm->count;
                                        ?>
                                        <li data-filter=".<?php echo $string = sanitize_title($catTerm->name);?>"><i class="fa <?php echo esc_attr($font_class);?>"></i><?php echo $catTerm->name; ?></li>
                                        <?php
                                    } 

                                 ?>
                            </ul>
                        </div>
                        <!--/ End portfolio Nav -->
                    </div>
                </div><!-- navRow -->
            </div>
            <?php } ?>
            <div class="portfolio-inner">
                <div class="mbrow stylex">  
                    <div class="isotop-active" style="position: relative; min-height: 299.532px;">

                        <!-- Single portfolio -->
                        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                            <?php 

                            $term_list = get_the_terms($post->ID, 'mb-portfolio-category');
                            $types ='';
                            $types_tilte='';
                            foreach($term_list as $term_single) {
                                 $types .= sanitize_title($term_single->name).' ';
                                 $types_tilte .= $term_single->name.', ';


                            }
                            $typesz = rtrim($types, ' ');
                            $typesz_title = rtrim($types_tilte, ', ');

                             ?>
                        <div class="mix <?php echo $typesz; ?> mbcol-md-4 mbcol-sm-6 mbcol-xs-12 mbcol-fix" style="position:absolute; left: 0px; top: 0px;">
                            <div class="portfolio-single">
                                <div class="portfolio-head">
                                    <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID),'thumbnail' ); ?>
                                   <img src="<?php echo esc_url_raw($url); ?>" alt="portfolio-imge">
                                </div>
                                <div class="portfolio-hover" style="margin-top: -83.5px;">
                                    <h4 class="cath4"><span><?php echo $typesz_title; ?></span><a href="<?php esc_url(the_permalink()); ?>"><?php _e(the_title()); ?></a></h4>
                                    <p class="portfolio-description"><?php echo _e(substr( get_the_content(), 0, 110 ))." <i class='more-link'>...</i>"; ?> </p>
                                    <div class="mbbutton">
                                        <a class="gallary" data-lightbox="example-set" href="<?php echo esc_url_raw($url); ?>" data-title="<?php _e(the_title()); ?>" ><i class="fa fa-search"></i></a>
                                        <?php  $portfolio_custom_link = esc_url_raw(get_post_meta( get_the_id(), 'mb-link', true ));
                                       if ($portfolio_custom_link=="") {
                                           $portfolio_custom_link='#';
                                       }
                                        ?>
                                        <a href="<?php echo esc_url_raw($portfolio_custom_link); ?>" target='_blank' class="primary"><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endwhile;
                            
                        wp_reset_postdata(); ?>
                        <!--/ End portfolio -->                     
                    </div> 
                   
                </div>
            </div>
            <?php if ($pagination=='true') {  ?>
            <div class="mbcontainer "><!-- pagination-contaner -->
                <div class="mbrow text-center"><!-- pagination-row -->    
                    <div class="mbpagination">
                    <?php 
                        echo paginate_links( array(
                            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                            'total'        => $query->max_num_pages,
                            'current'      => max( 1, get_query_var( 'paged' ) ),
                            'format'       => '?paged=%#%',
                            'show_all'     => false,
                            'type'         => 'plain',
                            'end_size'     => 2,
                            'mid_size'     => 1,
                            'prev_next'    => true,
                            'prev_text'    => '<i class="fa fa-angle-left"></i>',
                            'next_text'    => '<i class="fa fa-angle-right"></i>',
                            'add_args'     => false,
                            'add_fragment' => '',
                        ) );
                    ?>
                    </div>
                </div><!-- pagination-row -->

            </div><!-- pagination-contaner -->
            <?php } ?><!-- pagination-if-end -->
        </div>
    
    </div>
    </section>
   <?php
    }//loop if
    
}//shortcode function end