<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Abraham Lincoln
 * @since 		Abraham Lincoln 0.1.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
      <div class="row">
          <div class="row content article">
            <div class="col-md-9">
              <div class="relative">
                  <div class="article-text">
					<h2>Page not found</h2>
				  </div>
				</div>
            </div>
            <div class="col-md-3">
              <div class="box">
                <h2><a href="section.html">Media</a></h2>
                <ul>
                  <li><a href="article.html"><strong>REALLY COOL TITLE</strong>By Lily, EIC</a></li>
                  <li><a href="article.html"><strong>REALLY COOL TITLE</strong>By Christina, EIC</a></li>
                  <li><a href="article.html"><strong>REALLY COOL TITLE</strong>By Miranda, EIC</a></li>
                </ul>
              </div>
              <div class="box">
                <h2><a href="section.html">Popular</a></h2>
                <ul>
                  <li><a href="article.html"><strong>REALLY COOL TITLE</strong>By Lily, EIC</a></li>
                  <li><a href="article.html"><strong>REALLY COOL TITLE</strong>By Christina, EIC</a></li>
                  <li><a href="article.html"><strong>REALLY COOL TITLE</strong>By Miranda, EIC</a></li>
                </ul>
              </div>
            </div>
          </div>
      </div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>