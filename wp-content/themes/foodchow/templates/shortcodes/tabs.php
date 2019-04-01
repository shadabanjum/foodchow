<ul class="nav nav-tabs coaching" role="tablist">

		<?php if ( ! empty( $tag ) ) : ?>

            
	        <?php $counter = 0; foreach ($tag as $key => $value) { ?>
	            <?php $term = get_term_by('slug', $value, 'courses_tag'); ?>
	                <li class="nav-item">
		                <a class="<?php echo ( $counter == 0 ) ? 'active' : ''; ?>" href="#<?php echo esc_attr( foodchow_set($term, 'slug' )); ?>" data-toggle="tab">
			                <?php echo esc_html( foodchow_set($term, 'name' ) ); ?>
                        </a>
	                </li>

            <?php $counter++; } ?>
	    <?php endif; ?>
</ul>

