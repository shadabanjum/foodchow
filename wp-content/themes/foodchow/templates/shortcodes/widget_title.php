    <?php if ( $enable_title_typo ) {
        $title_font = foodchow_getFontsData( $title_font );
        $title_font_inline_style = foodchow_googleFontsStyles( $title_font );
    } ?>

        <style type="text/css">
         <?php if ( $enable_title_typo ) { ?>
        .<?php echo esc_attr( $class ); ?> h4{

            font-size : <?php echo esc_attr($title_size).' !important';?>;
            color: <?php echo esc_attr($title_color).' !important';?>;
            line-height: <?php echo esc_attr($title_lineheight).' !important';?>;
        }
           <?php } ?>

        <?php if( $enable_colorschem_sec && $colorschem_news ) { ?>
         .widget-news .recent-info a:hover, .service-links > li a:hover, .twitter-widget > li i, .twitter-meta > span, .twitter-meta > h5:hover{
                color : <?php echo esc_attr( $colorschem_news );?> !important;
        }
        <?php } ?>
       .<?php echo esc_attr( $class ); ?> h4:before{

            left : <?php echo ( $text_position == 'center' ) ? '50%' : '0'; ?>;
            <?php if( $enable_colorschem_sec && $colorschem_news ) { ?>

                background : <?php echo esc_attr( $colorschem_news );?>;

            <?php } ?>

        }
        
        <?php if( $enable_colorschem_sec && $colorschem_news ) { ?>
            .<?php echo esc_attr( $class ); ?>  .news-ltr > button, .twitter-widget .ps-scrollbar-y{

                background : <?php echo esc_attr( $colorschem_news );?>;
            }
        
        <?php } ?>

    </style>        
   <h4 class="widget-title" <?php echo ( $enable_title_typo ) ? 'style="'.esc_attr( $title_font_inline_style ).'"' : ''; ?>><?php echo wp_kses( $title, true ); ?></h4>
