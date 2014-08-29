<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package   WordPress
 * @subpackage  Abraham Lincoln
 * @since     Abraham Lincoln 0.1.0
 */
?>
<?php get_header(); ?>
  <!-- Post info in the image part will not work yet, because it is not a loop -->
  <?php
    //286 is the category ID for the primary post
    $category = 286;
    $args = array(
        'category' => $category
    );

    $top_posts = get_posts($args);
    echo "<!-- total " . count($top_posts) . " posts -->";
      //image for the first one
    //echo '<li><a href="' . get_permalink($recent[0]["ID"]) . '" title="Look '.esc_attr($recent[0]["post_title"]).'" ><strong>' .   $recent[0]["post_title"].'</strong>By ' .   $recent[0]["post_author"].'</a> </li> ';
    $post = $top_posts[0];
  ?>
      <div class="row">
          <div class="row content top">
            <div class="col-md-7">
              <div class="relative">
                <img src="<? echo arg_photo($post, 650, '', '', true); ?>">
                <div class="on-top white-top">
                  <h2><span><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark">
                    <?php echo str_replace(":", ":<br>", get_the_title()); ?>
                  </a></span></h2>
                  <h4><span><?php the_date(); ?> <?php the_time_ago(); ?> <? echo abraham_get_author(false); ?></span></h4>
                </div>
              </div>
                <?php if (function_exists('the_subheading')) { the_subheading('<p>', '</p>'); } ?>
            </div>
            <div class="col-md-5">
            <?php
              //86 is the category ID for Secondary Posts
              $category = 86;
              $excluded_categories = (87);
              $args = array(
                  'category' => $category,
                  'category__not_in' => $excluded_categories
              );

              $top_posts = get_posts($args);

              $count = 0;
              foreach ($top_posts as $post) {
                if($count < 5) {
              ?>
              <div class="media">
                <a class="pull-left" href="#">
                  <img src="<? echo arg_photo($post, 170, '', '', true); ?>">
                </a>
                <div class="media-body">
                  <h4 class="media-heading">
                    <a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a>
                  </h4>
                  <h5><span><? echo abraham_get_author(false); ?></span></h5>
                  <?php if (function_exists('the_subheading')) { the_subheading('<p>', '</p>'); } ?>
                </div>
              </div>
            <?php
                }
                $count++;
              }
            ?>
            </div>
          </div>
      </div>

<?php
$first_row = array(
  array("section" => "News",    "id" => 3),
  array("section" => "Features","id" => 4),
  array("section" => "Sports",  "id" => 5),
  array("section" => "Arts",    "id" => 6)
);
$second_row = array(
  array("section" => "Wespeaks","id" => 13),
  array("section" => "Opinion", "id" => 16),
  array("section" => "Food",    "id" => 75)
  //the fourth column is the PDF viewer
);
//columns should be generated by loops
?>
      <div class="row front-sections">
        <?php
          foreach ($first_row as $column) {
        ?>
        <div class="col-md-3">
          <div class="box">
            <h2><a href="<?php echo esc_url(get_category_link($column["id"])); ?>"><?php echo $column["section"]; ?></a></h2>
    				<?php

              $query = new WP_Query(array('category__and'=>array($column["id"], 87),
                                             'numberposts'=>1));
              $count = 0;
              while ( $query->have_posts() ) {
                $query->the_post();
                $top_post = get_post();
                if($count == 0) {
                  echo "<img src='". arg_photo($post, 263, '', '', true)  . "'>";
                  echo "<ul>";
                }
                echo '<li><a href="' . get_permalink() . '" title="Look '.get_the_title().'" ><strong>' .   get_the_title().'</strong></a>' . abraham_get_author(true) . '</li> ';
              }

              $args = array(
                  'category' => $column["id"],
                  'category__not_in' => array(86, 87, 89),
                  'numberposts' => 2,
                  'orderby' => 'post_date',
                  'order' => 'DESC'
              );

              $cat_posts = get_posts($args);

    					foreach( $cat_posts as $post ){
                //image for the first one

    						echo '<li><a href="' . get_permalink() . '" title="Look '.get_the_title().'" ><strong>' .   get_the_title().'</strong></a>' . abraham_get_author(true) . '</li> ';
              }
    				?>
            </ul>
          </div>
        </div>
        <?php
          }
        ?>
      </div>
      <div class="row front-sections">
        <?php
          foreach ($second_row as $column) {
        ?>
        <div class="col-md-3">
          <div class="box">
            <h2><a href="<?php echo esc_url(get_category_link($column["id"])); ?>"><?php echo $column["section"]; ?></a></h2>
            <ul>
				<?php
          $args = array(
              'numberposts' => '3',
              'category' => $column["id"],
              'orderby' => 'post_date',
              'order' => 'DESC'
            );
					$recent_posts = get_posts( $args );
					foreach( $recent_posts as $post ){
                echo '<li><a href="' . get_permalink() . '" title="Look '.get_the_title().'" ><strong>' .   get_the_title().'</strong></a>' . abraham_get_author(true) . '</li> ';
					}
				?>
            </ul>
          </div>
        </div>
        <?php
          }
        ?>
        <div class="col-md-3">
          <div class="box pdf-box">
            <h2>Media</h2>
            <?php
              $args = array(
                'numberposts' => '3',
                'category' => 89,
                'orderby' => 'post_date',
                'order' => 'DESC'
              );
              $recent_posts = get_posts( $args );
              $count = 0;
              foreach( $recent_posts as $post ){
                if($count == 0) {
                  echo "<img src='". arg_photo($post, 263, '', '', true)  . "'>";
                  echo "<ul>";
                }
                echo '<li><a href="' . get_permalink() . '" title="Look '.get_the_title().'" ><strong>' .   get_the_title().'</strong></a>' . abraham_get_author(true) . '</li> ';
                $count++;
              }
            ?>
            </ul>
          </div>
        </div>
      </div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>
