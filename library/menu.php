<?php 
function library_academy_menu( $menu, $element ) {

    if ( $menu == 'primary' ) {

        if ( $element == 'label' ) {

            if ( is_page('about') || is_tree( 7 ) ) {
                $element = 'About the Library';
            }
                elseif ( is_page('collection') || is_tree( 118 ) ) { $element = 'Our Collection'; }
                elseif ( is_page( 'events' ) || is_tree( 27 ) ) { $element = 'Events'; } 
                elseif ( is_page( 'kids' ) || is_tree( 9 ) ) { $element = 'Kids'; }
                elseif ( is_page( 'services' ) || is_tree( 34 ) ) { $element = 'What We Offer'; }
           
            else { $element = ''; }            
            return $element;

        } // if $element == 'label'

        if ( $element == 'menu' ) {

            $args =  array(                
                'menu'          => 'primary-menu',
                'container'     => false,
                'menu_class'    => 'sub-menu',
                'fallback_cb'   => false
            );

            wp_nav_menu( $args );

        } // if $element is 'menu'
        
    } // if $menu is 'primary'

    if ( $menu == 'secondary' ) {

        if ( $element == 'label' ) {

            if ( !is_front_page() ) {

                if ( get_query_var( 'for' ) == 'kids' ) {
                    
                    $element = 'Children\'s Programs';

                } elseif ( get_query_var( 'for' ) == 'teens' ) {

                    $element = 'For Teens';
                }

                elseif ( is_page( 'collection' ) ) { $element = ''; }

                elseif ( is_page( 'events' ) ) {

                    $element = 'See All';
                }

                elseif ( is_page( 'kids' ) ) {
                    $element = 'Home';
                }

                else {

                    $element = get_the_title( $ID );

                }

            }

            else { $element = 'Menu'; }

            return $element;
        } // if $element is 'label'

        if ( $element == 'menu') {

            $args =  array(

                'menu'          => 'Secondary Menu',
                'container'     => false,
                'menu_class'    => 'sub-menu',
                'fallback_cb'   => false
            );

            wp_nav_menu( $arg );

        } // if $element is 'menu'

    } // if $menu is 'secondary'
    
}
 ?>