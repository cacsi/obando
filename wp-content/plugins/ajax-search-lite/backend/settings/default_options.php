<?php

function asl_do_init_options() {
    global $wd_asl;

    $wd_asl->options = array();
    $options = &$wd_asl->options;
    $wd_asl->o = &$wd_asl->options;

    /* Default caching options */
    $options = array();

    /* Analytics options */
    $options['asl_analytics_def'] = array(
        'analytics' => 0, // 0, ga, gtag
        'analytics_tracking_id' => "",
        'analytics_string' => "?ajax_search={asl_term}",
        // Gtag on input focus
        'gtag_focus' => 1,
        'gtag_focus_action' => 'focus',
        'gtag_focus_ec' => 'ASL',
        'gtag_focus_el' => 'Input focus',
        'gtag_focus_value' => '1',
        // Gtag on search start
        'gtag_search_start' => 0,
        'gtag_search_start_action' => 'search_start',
        'gtag_search_start_ec' => 'ASL',
        'gtag_search_start_el' => 'Phrase: {phrase}',
        'gtag_search_start_value' => '1',
        // Gtag on search end
        'gtag_search_end' => 1,
        'gtag_search_end_action' => 'search_end',
        'gtag_search_end_ec' => 'ASL',
        'gtag_search_end_el' => '{phrase} | {results_count}',
        'gtag_search_end_value' => '1',
        // Gtag on magnifier
        'gtag_magnifier' => 1,
        'gtag_magnifier_action' => 'magnifier',
        'gtag_magnifier_ec' => 'ASL',
        'gtag_magnifier_el' => 'Magnifier clicked',
        'gtag_magnifier_value' => '1',
        // Gtag on return
        'gtag_return' => 1,
        'gtag_return_action' => 'return',
        'gtag_return_ec' => 'ASL',
        'gtag_return_el' => 'Return button pressed',
        'gtag_return_value' => '1',
        // Gtag on facet change
        'gtag_facet_change' => 0,
        'gtag_facet_change_action' => 'facet_change',
        'gtag_facet_change_ec' => 'ASL',
        'gtag_facet_change_el' => '{option_label} | {option_value}',
        'gtag_facet_change_value' => '1',
        // Gtag on result click
        'gtag_result_click' => 1,
        'gtag_result_click_action' => 'result_click',
        'gtag_result_click_ec' => 'ASL',
        'gtag_result_click_el' => '{result_title} | {result_url}',
        'gtag_result_click_value' => '1',
    );


    $options['asl_performance_def'] = array(
        'use_custom_ajax_handler' => 0,
        'image_cropping' => 0,
        'load_in_footer' => 1
    );

    /* Compatibility defaults */
    $options['asl_compatibility_def'] = array(
        // CSS JS
        'js_source' => "min",
        'js_init' => "dynamic",
        'load_scroll_js' => 'yes',
        'js_fix_duplicates' => 1,
        "detect_ajax" => 0,
        "js_retain_popstate" => 0,
        'load_google_fonts' => 1,
        'old_browser_compatibility' => 1,
        // DB
        'use_acf_getfield' => 0,
        'db_force_case' => 'none',
        'db_force_unicode' => 0,
        'db_force_utf8_like' => 0
    );


    /* Default new search options */

// General options
    $options['asl_defaults'] = array(
        'theme' => 'simple-red',
        'override_search_form' => 0,
        'override_woo_search_form' => 0,
        'keyword_logic' => "and",
        'trigger_on_facet_change' => 1,
        'redirect_click_to' => 'results_page',
        'redirect_enter_to' => 'results_page',
        'click_action_location' => 'same',
        'return_action_location' => 'same',
        'custom_redirect_url' => '?s={phrase}',
        'results_per_page' => 10,
        'triggerontype' => 1,
        'customtypes' => array('post', 'page'),
        'searchintitle' => 1,
        'searchincontent' => 1,
        'searchinexcerpt' => 1,
        'search_in_permalinks' => 0,
        'search_in_ids' => 0,
        'search_all_cf' => 0,
        'customfields' => "",
        'post_status' => 'publish',
        'override_default_results' => 0,
        'override_method' => 'get',

        'exactonly' => 0,
        'exact_match_location' => 'anywhere',
        'searchinterms' => 0,

        'charcount' => 0,
        'maxresults' => 10,
        'itemscount' => 4,
        'resultitemheight' => "70px",

        'orderby_primary' => 'relevance DESC',
        'orderby_secondary' => 'date DESC',

    // General/Image
        'show_images' => 1,
        'image_transparency' => 1,
        'image_bg_color' => "#FFFFFF",
        'image_width' => 70,
        'image_height' => 70,
        'image_parser_image_number' => 1,

        'image_crop_location' => 'c',
        'image_crop_location_selects' => array(
            array('option' => 'In the center', 'value' => 'c'),
            array('option' => 'Align top', 'value' => 't'),
            array('option' => 'Align top right', 'value' => 'tr'),
            array('option' => 'Align top left', 'value' => 'tl'),
            array('option' => 'Align bottom', 'value' => 'b'),
            array('option' => 'Align bottom right', 'value' => 'br'),
            array('option' => 'Align bottom left', 'value' => 'bl'),
            array('option' => 'Align left', 'value' => 'l'),
            array('option' => 'Align right', 'value' => 'r')
        ),

        'image_sources' => array(
            array('option' => 'Featured image', 'value' => 'featured'),
            array('option' => 'Post Content', 'value' => 'content'),
            array('option' => 'Post Excerpt', 'value' => 'excerpt'),
            array('option' => 'Custom field', 'value' => 'custom'),
            array('option' => 'Page Screenshot', 'value' => 'screenshot'),
            array('option' => 'Default image', 'value' => 'default'),
            array('option' => 'Disabled', 'value' => 'disabled')
        ),

        'image_source1' => 'featured',
        'image_source2' => 'content',
        'image_source3' => 'excerpt',
        'image_source4' => 'custom',
        'image_source5' => 'default',

        'image_default' => ASL_URL . "img/default.jpg",
        'image_source_featured' => 'original',
        'image_custom_field' => '',
        'use_timthumb' => 1,


        /* Frontend search settings Options */
        'show_frontend_search_settings' => 0,
        'showexactmatches' => 1,
        'showsearchinposts' => 1,
        'showsearchinpages' => 1,
        'showsearchintitle' => 1,
        'showsearchincontent' => 1,
        'showcustomtypes' => '',
        'showsearchincomments' => 1,
        'showsearchinexcerpt' => 1,
        'showsearchinbpusers' => 0,
        'showsearchinbpgroups' => 0,
        'showsearchinbpforums' => 0,

        'exactmatchestext' => "Exact matches only",
        'searchinpoststext' => "Search in posts",
        'searchinpagestext' => "Search in pages",
        'searchintitletext' => "Search in title",
        'searchincontenttext' => "Search in content",
        'searchincommentstext' => "Search in comments",
        'searchinexcerpttext' => "Search in excerpt",
        'searchinbpuserstext' => "Search in users",
        'searchinbpgroupstext' => "Search in groups",
        'searchinbpforumstext' => "Search in forums",

        'showsearchincategories' => 0,
        'showuncategorised' => 0,
        'exsearchincategories' => "",
        'exsearchincategoriesheight' => 200,
        'showsearchintaxonomies' => 1,
        'showterms' => "",
        'showseparatefilterboxes' => 1,
        'exsearchintaxonomiestext' => "Filter by",
        'exsearchincategoriestext' => "Filter by Categories",

        /* Layout Options */
        // Box layout
        'box_width' => "100%",
        'box_width_tablet' => '100%',
        'box_width_phone' => '100%',
        'box_margin' => "||0px||0px||0px||0px||",
        'box_font' => 'Open Sans',
        'override_bg' => 0,
        'override_bg_color' => '#FFFFFF',
        'override_icon' => 0,
        'override_icon_bg_color' => '#FFFFFF',
        'override_icon_color' => '#000000',
        'override_border' => 0,
        'override_border_style' => 'border:1px none rgb(0, 0, 0);border-radius:0px 0px 0px 0px;',
        // Results Layout
        'resultstype_def' => array(
            array('option' => 'Vertical Results', 'value' => 'vertical'),
            array('option' => 'Horizontal Results', 'value' => 'horizontal'),
            array('option' => 'Isotopic Results', 'value' => 'isotopic'),
            array('option' => 'Polaroid style Results', 'value' => 'polaroid')
        ),
        'resultstype' => 'vertical',
        'resultsposition_def' => array(
            array('option' => 'Hover - over content', 'value' => 'hover'),
            array('option' => 'Block - pushes content', 'value' => 'block')
        ),
        'resultsposition' => 'hover',
        'resultsmargintop' => '12px',

        'v_res_max_height' => 'none',

        'v_res_column_count' => 1,
        'v_res_column_min_width' => '200px',
        'v_res_column_min_width_tablet' => '200px',
        'v_res_column_min_width_phone' => '200px',

        'defaultsearchtext' => 'Search here..',
        'showmoreresults' => 0,
        'showmoreresultstext' => 'More results...',
        'results_click_blank' => 0,
        'scroll_to_results' => 0,
        'resultareaclickable' => 1,
        'close_on_document_click' => 1,
        'show_close_icon' => 1,
        'showauthor' => 0,
        'showdate' => 0,
        'showdescription' => 1,
        'descriptionlength' => 100,
        'description_context' => 0,
        'noresultstext' => "No results!",
        'didyoumeantext' => "Did you mean:",
        'kw_highlight' => 0,
        'kw_highlight_whole_words' => 1,
        'highlight_color' => "#d9312b",
        'highlight_bg_color' => "#eee",
        'custom_css' => "",

        // General/Autocomplete/KW suggestions
        'autocomplete' => 1,

        'kw_suggestions' => 1,
        'kw_length' => 60,
        'kw_count' => 10,
        'kw_google_lang' => "en",
        'kw_exceptions' => "",

        /* Advanced Options */
        'shortcode_op' => 'remove',
        'striptagsexclude' => '',
        'runshortcode' => 1,
        'stripshortcode' => 0,
        'pageswithcategories' => 0,


        'titlefield' => 0,
        'titlefield_cf' => '',
        'descriptionfield' => 0,
        'descriptionfield_cf' => '',

        'woo_exclude_outofstock' => 0,
        'exclude_woo_hidden' => 1,
        'exclude_woo_catalog' => 0,
        'excludecategories' => '',
        'excludeposts' => '',
        //'exclude_term_ids' => '',

        'wpml_compatibility' => 1,
        'polylang_compatibility' => 1
    );
}

/**
 * Merge the default options with the stored options.
 */
function asl_parse_options() {
    foreach ( wd_asl()->o as $def_k => $o ) {
        if ( preg_match("/\_def$/", $def_k) ) {
            $ok = preg_replace("/\_def$/", '', $def_k);

            wd_asl()->o[$ok] = asl_decode_params( get_option($ok, wd_asl()->o[$def_k]) );
            wd_asl()->o[$ok] = array_merge(wd_asl()->o[$def_k], wd_asl()->o[$ok]);
        }
    }
}

/**
 * This is the same as wd_asl()->instances->decode_params()
 * Needed, because the wd_asl()->instances is not set at this point yet.
 * Decodes the base encoded params after getting them from the DB
 *
 * @param $params
 * @return mixed
 */
function asl_decode_params( $params ) {
    /**
     * New method for future use.
     * Detects if there is a _decode_ prefixed input for the current field.
     * If so, then decodes and overrides the posted value.
     */
    foreach ($params as $k=>$v) {
        if (gettype($v) === "string" && substr($v, 0, strlen('_decode_')) == '_decode_') {
            $real_v = substr($v, strlen('_decode_'));
            $params[$k] = json_decode(base64_decode($real_v), true);
        }
    }
    return $params;
}

function asl_reset_option($key, $global = false) {
    if ( isset(wd_asl()->o[$key], wd_asl()->o[$key . '_def']) ) {
        wd_asl()->o[$key] = wd_asl()->o[$key . '_def'];
        asl_save_option($key, $global);
    }
}

/*
 * Updates the option value from the wd_asl()->o[key] array to the database
 */
function asl_save_option($key, $global = false) {
    if ( !isset(wd_asl()->o[$key]) )
        return false;

    if ( $global ) {
        return update_site_option($key, wd_asl()->o[$key]);
    } else {
        return update_option($key, wd_asl()->o[$key]);
    }
}

asl_do_init_options();
asl_parse_options();