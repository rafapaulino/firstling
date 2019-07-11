<?php
/**
 *
 * @package Firstling
 * @since 1.0.2
 */
if ( ! defined('ABSPATH')) exit('restricted access');

class PopularNews_Widget extends WP_Widget 
{
    public function __construct() 
    {
        $widget_options = array( 
            'classname' => 'popular-news-box',
            'description' => __('With this Widget you put the popular news in the sidebar.','firstling'),
        );        
        parent::__construct( 'popular-news-box', __('Popular News','firstling'), $widget_options );
    }

    public function form( $instance ) 
    {
        $total = ! empty( $instance['popular_news_total'] ) ? $instance['popular_news_total'] : 3;
        $title = ! empty( $instance['popular_news_title'] ) ? $instance['popular_news_title'] : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'popular_news_title' ); ?>"><?php echo __('Title','firstling'); ?>:</label>
            <input type="text" id="<?php echo $this->get_field_id( 'popular_news_title' ); ?>" name="<?php echo $this->get_field_name( 'popular_news_title' ); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat title" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'popular_news_total' ); ?>"><?php echo __('Total News','firstling'); ?>:</label>
            <input type="text" id="<?php echo $this->get_field_id( 'popular_news_total' ); ?>" name="<?php echo $this->get_field_name( 'popular_news_total' ); ?>" value="<?php echo esc_attr( $total ); ?>" class="widefat title" />
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) 
    { 
        $instance = $old_instance;
        $instance[ 'popular_news_total' ] = strip_tags( $new_instance[ 'popular_news_total' ] );
        $instance[ 'popular_news_title' ] = strip_tags( $new_instance[ 'popular_news_title' ] );

        return $instance;
    }

    public function widget( $args, $instance ) 
    {
        $total = apply_filters( 'widget_title', $instance[ 'popular_news_total' ] );
        $title = apply_filters( 'widget_title', $instance[ 'popular_news_title' ] );

        $widget = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => intval($total),
            'orderby' => 'date',
            'order'   => 'DESC',
        ));

        if ( $widget->have_posts() ) : 
    ?>
	<!-- posts recentes -->
	<aside id="posts-sidebar" class="widget">
		<h3 class="widget-title"><?php echo esc_attr($title); ?></h3>
        <!-- ultimas noticias -->
		<div class="ultimasNoticias">
			<!-- noticias -->
			<ul itemscope itemtype="http://schema.org/Article">
                <?php 
                    while ( $widget->have_posts() ) : $widget->the_post(); 
                        $title = esc_attr(get_the_title());
                        $url = esc_url(get_permalink());
                        $id = get_the_ID();
                        $date = esc_html( get_the_date() );
                        $img = firstling_getImageSRC($id,'news-sidebar');
                ?>
				<li>
					<a href="<?php echo $url; ?>" title="<?php echo $title; ?>" itemprop="url" class="ui-box topBottom-leftRightCorner">
						<span class="ui-border-element">
							<img src="<?php echo $img; ?>" alt="<?php echo $title; ?>" itemprop="image" class="img-fluid">
						</span>
					</a>
					<div class="titleDate">
						<h3 itemprop="headline"><a href="<?php echo $url; ?>" title="<?php echo $title; ?>" itemprop="url"><?php echo $title; ?></a></h3>
						<a class="time" href="<?php echo $url; ?>" title="<?php echo $title; ?>" itemprop="url"><?php echo $date; ?></a>
					</div>
				</li>
                <?php endwhile; ?>
            </ul>
            <!--/ noticias -->
        </div>
        <!--/ ultimas noticias -->
    </aside>
    <!--/ posts recentes -->
    <?php 
        endif;
    }
}