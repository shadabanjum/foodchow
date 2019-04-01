<?php $counter =2; foreach ( $packages as $package ) : ?>
	<div class="<?php echo esc_attr( $column ); ?> col-sm-6">
		<div class="price-tbl <?php echo esc_attr( $counter == 4 ) ? 'active' : ''; ?> wow fadeIn" data-wow-delay=".<?php echo esc_attr($counter); ?>s">
			<div class="table-head">
				<h2><?php echo esc_attr( foodchow_set( $package, 'title' ) );  ?></h2>
				<span><?php echo esc_attr( foodchow_set( $package, 'price' ) );  ?></span>
				<em><?php echo esc_attr( foodchow_set( $package, 'duration' ) );  ?></em>
			</div>
			<?php $features = json_decode( urldecode( foodchow_set( $package, 'add_feature' ) ) ); ?>

			<?php if ( $features ) : ?>
				<div class="table-body">
					<ul>
						
						<?php foreach ($features as $feature) : ?>

							<li><i class="fa fa-check"></i> <?php echo esc_html( foodchow_set( $feature, 'feature_pricing' ) );  ?></li>

						<?php endforeach; ?>
					</ul>
					 <?php if ( ! empty( foodchow_set( $package, 'help_link' ) ) && foodchow_set( $package, 'button' ) ) {
                            $link = ( '||' === foodchow_set( $package, 'help_link' ) ) ? '' : foodchow_set( $package, 'help_link' );
                            $link = vc_build_link( $link );

                        }

                        if ( foodchow_set( $package, 'button' ) && ( ! empty( $link ) ) ) : ?>

                        <a  href="<?php echo esc_url( $link['url'] ); ?>" <?php echo ( $link['target'] ) ? 'target=_blank' : ''; ?>>
                            <?php echo esc_html( $link['title'] ); ?>
                        </a>
                    <?php endif; ?>
				</div>
			<?php endif; ?>

		</div>
	</div>
<?php $counter+=2; endforeach; ?>
