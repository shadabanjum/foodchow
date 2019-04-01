<?php
/**
 * Header Style 1  File
 *
 * @package Foodchow
 * @author  Webiane
 * @version 1.0
 */ 

?>

<?php $options    = foodchow_WSH()->option(); ?>
<?php $menu_style =  'main_menu'; ?>


<header class="<?php echo esc_attr( $options->get( 'header1_sticky' ) ) ? 'stick' : ''; ?>">
 <?php if ( $options->get( 'header1_topbar' ) ) : ?>
   
   <?php foodchow_template_load( 'templates/header/header_1/topbar.php', compact( 'options' ) ); ?>
<?php endif; ?>
<div class="logo-menu-sec">
    <div class="container">
        <?php foodchow_template_load( 'templates/header/header_1/logobar.php', compact( 'options' ) ); ?>
        <nav>
            <div class="menu-sec">
                <?php foodchow_template_load( 'templates/header/navigation.php', compact( 'options', 'menu_style' ) ); ?>
                <?php if( $options->get( 'header1_button' ) && $options->get( 'appointment1_page' ) && $options->get( 'appointment_label' ) ) : ?>
                    <a class="red-bg brd-rd4" href="<?php echo esc_url( get_page_link( $options->get( 'appointment1_page' ) ) ); ?>" itemprop="url"><?php echo esc_html( $options->get( 'appointment_label' ) ); ?></a>
                <?php endif; ?>
            </div>
        </nav><!-- Navigation -->
    </div>
</div><!-- Logo Menu Section -->
</header><!-- Header -->



<?php foodchow_template_load( 'templates/header/responsive_header.php', compact( 'options' ) ); ?>
