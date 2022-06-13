<?php
$post_type = get_query_var("post_type");
if(isset($_REQUEST["archive"]))
    $archive = $_REQUEST["archive"];
?>
<aside class="aside-list sticky-sidebar search-results-filters">
    <form role="search" method="get" class="search-form" action="<?php echo home_url(""); ?>">
        <?php if(isset($post_type) && !is_array($post_type) && $post_type != ""){ ?>
        <input type="hidden" name="post_type" value="<?php echo $post_type; ?>">
        <?php } ?>

        <?php if(isset($archive) && $archive != ""){ ?>
            <input type="hidden" name="archive" value="<?php echo $archive; ?>">
        <?php } ?>
        <h3 class="h6 text-uppercase"><strong><?php _e("Argomenti", "design_scuole_italia"); ?></strong></h3>
        <ul>
			<?php
			$terms = get_terms( array(
				'taxonomy' => 'post_tag',
				'hide_empty' => true,
			) );
			foreach ( $terms as $term ) {
				?>
                <li>
                    <div class="form-check my-0">
                        <input type="radio" class="custom-control-input" name="cat" value="<?php echo $term->term_id; ?>" id="check-<?php echo $term->slug; ?>" <?php if($term->term_id == get_query_var("cat")) echo " checked "; ?> onChange="this.form.submit()">
                        <label class="mb-0" for="check-<?php echo $term->slug; ?>"><?php echo $term->name; ?></label>
                    </div>
                </li>

				<?php
			}
			?>
        </ul>

        <h3 class="h6 text-uppercase"><strong><?php _e("Argomenti", "design_scuole_italia"); ?></strong></h3>
        <ul>
            <?php
            $terms = get_terms( array(
	            'taxonomy' => 'post_tag',
	            'hide_empty' => true,
	            'orderby'    => 'count',
                'order'   => 'DESC',
                'number' => 20,
            ) );
            foreach ($terms as $term){
                ?>
                <li>
                    <div class="custom-control custom-checkbox custom-checkbox-outline">
                        <input type="checkbox" class="custom-control-input" name="post_terms[]" value="<?php echo $term->term_id; ?>" id="check-<?php echo $term->slug; ?>" <?php if(in_array($term->term_id, $post_terms)) echo " checked "; ?> onChange="this.form.submit()">
                        <label class="custom-control-label" for="check-<?php echo $term->slug; ?>"><?php echo $term->name; ?></label>
                    </div>
                </li>
            <?php
            }
            ?>
        </ul>
    </form>
</aside>