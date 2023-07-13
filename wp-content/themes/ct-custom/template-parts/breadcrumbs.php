<?php
/**
 * Get Breadcrumbs
 */
function get_breadcrumbs() {
    $breadcrumbs = '<div class="breadcrumbs"><a href="' . home_url() . '">Home</a>';
    $separator = '<span class="separator"> / </span>';

    global $post;
    if (is_page() && $post->post_parent) {
        $parent_id = $post->post_parent;
        $breadcrumbs_array = array();
        while ($parent_id) {
            $page = get_post($parent_id);
            $breadcrumbs_array[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
            $parent_id = $page->post_parent;
        }
        $breadcrumbs_array = array_reverse($breadcrumbs_array);
        foreach ($breadcrumbs_array as $breadcrumb) {
            $breadcrumbs .= $separator . $breadcrumb;
        }
    }

    if (is_page()) {
        $breadcrumbs .= $separator . get_the_title();
    } elseif (is_single()) {
        $breadcrumbs .= $separator;
        $categories = get_the_category();
        if ($categories) {
            $breadcrumb_categories = array();
            foreach ($categories as $category) {
                $breadcrumb_categories[] = '<a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>';
            }
            $breadcrumbs .= implode(', ', $breadcrumb_categories);
        }
        $breadcrumbs .= $separator . get_the_title();
    } elseif (is_category()) {
        $breadcrumbs .= $separator;
        $breadcrumbs .= single_cat_title('', false);
    } elseif (is_search()) {
        $breadcrumbs .= $separator . 'Search Results for: ' . get_search_query();
    } elseif (is_404()) {
        $breadcrumbs .= $separator . '404 Not Found';
    }

    $breadcrumbs .= '</div>';

    return $breadcrumbs;
}
echo get_breadcrumbs();