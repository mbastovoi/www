<?php
/** no direct access **/
defined('MECEXEC') or die();

/**
 * @author Webnus <info@webnus.biz>
 */
class MEC_feature_search extends MEC_base
{

    public $factory;
    public $main;
    public $settings;

    /**
     * Constructor method
     * @author Webnus <info@webnus.biz>
     */
    public function __construct()
    {
        // Import MEC Factory
        $this->factory = $this->getFactory();
        
        // Import MEC Main
        $this->main = $this->getMain();

        // MEC Settings
        $this->settings = $this->main->get_settings();

    }
    
    /**
     * Initialize search feature
     * @author Webnus <info@webnus.biz>
     */
    public function init()
    {
        // search Shortcode
        $this->factory->shortcode('MEC_search_bar', array($this, 'search'));

        if ( isset($this->settings['search_bar_ajax_mode']) && $this->settings['search_bar_ajax_mode'] == '1' )
        {
            $this->factory->action('wp_ajax_mec_get_ajax_search_data', array($this, 'mec_get_ajax_search_data'));
            $this->factory->action('wp_ajax_nopriv_mec_get_ajax_search_data', array($this, 'mec_get_ajax_search_data'));
        } else {
            $this->factory->filter('pre_get_posts', array($this, 'mec_search_filter'));
        }
    }

    /**
     * Show taxonomy
     * @param string $taxonomy
     * @param string $icon
     * @return boolean|string
     */
    public function show_taxonomy($taxonomy, $icon)
    {
        $terms = get_terms($taxonomy, array('hide_empty' => false));
        $out = '';
        
        if(is_wp_error($terms) || empty($terms)) return false;
        $taxonomy_name = ($taxonomy == 'post_tag') ? 'Tag' : str_replace('mec_', '', $taxonomy);

        $out .= '<div class="mec-dropdown-search"><i class="mec-sl-'.$icon.'"></i>';
        $args = array(
            'show_option_none'   => $taxonomy_name,
            'option_none_value'  => '',
            'orderby'            => 'name',
            'order'              => 'ASC',
            'show_count'         => 0,
            'hide_empty'         => 0,
            'include'            =>((isset($taxonomy_name) and trim($taxonomy_name)) ? $taxonomy_name : ''),
            'echo'               => false,
            'selected'           => 0,
            'hierarchical'       => true,
            'name'               => $taxonomy_name,
            'taxonomy'           => $taxonomy,
        );

        $out .= wp_dropdown_categories($args);
        $out .= '</div>';

        return $out;
    }

    public function mec_get_ajax_search_data(){

        if ( $_POST['length'] < '3' ) 
        {
            _e('Please enter at least 3 characters and try again' , 'modern-events-calendar-lite');
            die();
        }

        $mec_quesries = array();

        if(!empty($_POST['location']))
        {
            $location = sanitize_text_field( $_POST['location'] );
            $mec_quesries[] = array(
                'taxonomy'  => 'mec_location',
                'field'     => 'id',
                'terms'     => array( $location ),
                'operator'  => 'IN'
            );
        }

        if(!empty($_POST['category']))
        {
            $category = sanitize_text_field( $_POST['category'] );
            $mec_quesries[] = array(
                'taxonomy'  => 'mec_category',
                'field'     => 'id',
                'terms'     => array( $category ),
                'operator'  => 'IN'
            );
        }

        if(!empty($_POST['organizer']))
        {
            $organizer = sanitize_text_field( $_POST['organizer'] );
            $mec_quesries[] = array(
                'taxonomy'  => 'mec_organizer',
                'field'     => 'id',
                'terms'     => array( $organizer ),
                'operator'  => 'IN'
            );
        }

        if(!empty($_POST['speaker']))
        {
            $speaker = sanitize_text_field( $_POST['speaker'] );
            $mec_quesries[] = array(
                'taxonomy'  => 'mec_speaker',
                'field'     => 'id',
                'terms'     => array( $speaker ),
                'operator'  => 'IN'
            );
        }

        if(!empty($_POST['tag']))
        {
            $tag = sanitize_text_field( $_POST['tag'] );
            $mec_quesries[] = array(
                'taxonomy'  => 'post_tag',
                'field'     => 'id',
                'terms'     => array( $tag ),
                'operator'  => 'IN'
            );
        }

        if(!empty($_POST['label']))
        {
            $label = sanitize_text_field( $_POST['label'] );
            $mec_quesries[] = array(
                'taxonomy'  => 'mec_label',
                'field'     => 'id',
                'terms'     => array( $label ),
                'operator'  => 'IN'
            );
        }

        $the_query = new WP_Query(array(
            'tax_query' => $mec_quesries,
            's' => esc_attr( $_POST['keyword'] ),
            'post_type' => 'mec-events' 
        ));

        if( $the_query->have_posts() ) :
            while( $the_query->have_posts() ): $the_query->the_post();
                include MEC::import('app.features.search_bar.search_result', true, true);
            endwhile;
            wp_reset_postdata();  
        else:
            include MEC::import('app.features.search_bar.search_noresult', true, true);
        endif;

        die();
    }

    /**
     * Search Filter
     * @param object $query
     * @return string
     */
    public function mec_search_filter($query)
    {
        // Do not change Query if it is not search page!
        if(!$query->is_search) return $query;

        // Do not change Query if it is not a search related to MEC!
        if($query->get('post_type') != 'mec-events') return $query;

        $mec_quesries = array();
        if(!empty($_GET['location']))
        {
            $mec_quesries[] = array(
                'taxonomy' => 'mec_location',
                'field' => 'id',
                'terms' => array( $_GET['location'] ),
                'operator'=> 'IN'
            );
        }

        if(!empty($_GET['category']))
        {
            $mec_quesries[] = array(
                'taxonomy' => 'mec_category',
                'field' => 'id',
                'terms' => array( $_GET['category'] ),
                'operator'=> 'IN'
            );
        }

        if(!empty($_GET['organizer']))
        {
            $mec_quesries[] = array(
                'taxonomy' => 'mec_organizer',
                'field' => 'id',
                'terms' => array( $_GET['organizer'] ),
                'operator'=> 'IN'
            );
        }

        if(!empty($_GET['speaker']))
        {
            $mec_quesries[] = array(
                'taxonomy' => 'mec_speaker',
                'field' => 'id',
                'terms' => array( $_GET['speaker'] ),
                'operator'=> 'IN'
            );
        }

        if(!empty($_GET['tag']))
        {
            $mec_quesries[] = array(
                'taxonomy' => 'post_tag',
                'field' => 'id',
                'terms' => array( $_GET['tag'] ),
                'operator'=> 'IN'
            );
        }

        if(!empty($_GET['label']))
        {
            $mec_quesries[] = array(
                'taxonomy' => 'mec_label',
                'field' => 'id',
                'terms' => array( $_GET['label'] ),
                'operator'=> 'IN'
            );
        }

        $query->set('tax_query', $mec_quesries);
        $query->set('post_type', array('post','mec-events'));

        return $query;
    }

    /**
     * Show user search bar
     * @return string
     */
    public function search()
    {
        $path = MEC::import('app.features.search_bar.search_bar', true, true);

        ob_start();
        include $path;
        return ob_get_clean();
    }
}