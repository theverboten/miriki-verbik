<?php

// Config
define('PROJECT', 'Miriki');
define('VERSION', '1.0.0');
define('STYLES_DIR', 'public/css');
define('SCRIPTS_DIR', 'public/js');
define('IMAGES_DIR', 'public/images');

define('SITE_TITLE', 'Miriki');
define('SITE_DESCRIPTION', '');
define('DEFAULT_SKIN', '');


// ==========================================================================================================//
// CONDITIONALS
// ==========================================================================================================//

function is_page($slug): bool
{
    if (is_array($slug)) {
        foreach ($slug as $filename) {
            if (strpos($_SERVER['PHP_SELF'], '/' . $filename . '.php')) {
                return true;
            }
        }
        return false;
    } else {
        return strpos($_SERVER['PHP_SELF'], '/' . $slug . '.php');
    }
}

function is_homepage(): bool
{
    return is_page('index');
}


// ==========================================================================================================//
// IMAGES
// ==========================================================================================================//

// SVG Icons
function get_icon(string $icon_name, string $sprite_name = '', string $custom_css_classes = '')
{
    $output      = '';
    $css_classes = array('icon', 'icon--' . $icon_name);

    $sprite_name = $sprite_name != '' ? $sprite_name . '-' : $sprite_name;

    if ($custom_css_classes) {
        $css_classes[] = $custom_css_classes;
    }

    $output .= '<span class="' . implode(' ', $css_classes) . '">';
    $output .= '<svg><use xlink:href="' . IMAGES_DIR . '/' . $sprite_name . 'sprite.svg#' . $icon_name . '"></use></svg>';
    $output .= '</span>';

    return $output;
}

function icon(string $icon_name, string $sprite_name = '', string $custom_css_classes = '')
{
    echo get_icon($icon_name, $sprite_name, $custom_css_classes);
}

// Lorem picsum
function get_lorem_picsum($id = null, int $width = 1024, int $height = 0, string $att = '')
{
    $source_url = 'https://picsum.photos';
    $id         = $id ? '/id/' . $id : '';
    $height     = $height ?: round($width * 0.75);

    return $source_url . $id . '/' . $width . '/' . $height . '/?' . $att;
}

function lorem_picsum($id = null, int $width = 1024, int $height = 0, string $att = '')
{
    echo get_lorem_picsum($id, $width, $height, $att);
}


// ==========================================================================================================//
// SKINS
// ==========================================================================================================//
function get_skin(): string
{
    return isset($_GET['skin']) ? $_GET['skin'] : DEFAULT_SKIN;
}

function skin(): void
{
    echo get_skin();
}

function is_skin($skin): bool
{
    return $skin === get_skin();
}


// ==========================================================================================================//
// TEMPLATING
// ==========================================================================================================//
require_once 'Templating.php';
$templating = new Templating();

// Components
function get_component($filename, $args)
{
    global $templating;
    return $templating->getTemplate('components' . DIRECTORY_SEPARATOR . $filename . '.php', $args);
}

function component($filename, $args = array())
{
    echo get_component($filename, $args);
}

// Partials
function get_partial($filename, $args)
{
    global $templating;
    return $templating->getTemplate('partials' . DIRECTORY_SEPARATOR . $filename . '.php', $args);
}

function partial($filename, $args = array())
{
    echo get_partial($filename, $args);
}

// Placeholder
function get_placeholder($input, $fallback)
{
    if (!$input) {
        return $fallback;
    }

    return $input;
}

function placeholder($input, $fallback)
{
    echo get_placeholder($input, $fallback);
}

// Repeat
function repeat(string $str, int $repeat = 1)
{
    for ($i = 0 ; $i < $repeat; $i++) {
        echo $str;
    }
}


// Page title
function get_page_title()
{
    global $page_title;

    if (!isset($page_title) || empty($page_title) || !is_string($page_title)) {
        return SITE_TITLE;
    }

    return $page_title . ' | ' . SITE_TITLE;
}

function page_title()
{
    echo get_page_title();
}

// Page description
function get_page_description()
{
    global $page_description;

    if (!isset($page_description) || empty($page_description) || !is_string($page_description)) {
        return SITE_DESCRIPTION;
    }

    return $page_description;
}

function page_description()
{
    echo get_page_description();
}


// ==========================================================================================================//
// CUSTOM
// ==========================================================================================================//

// Wrapper classes
/* function wrapper_classes()
{
    $classes = array('wrapper');

    if (is_skin('dark')) {
        $classes[] = 'wrapper--dark';
    }

    if (is_page(['poradci', 'kontakt']) && !isset($_GET['skin'])) {
        $classes[] = 'wrapper--dark';
    }

    array_unique($classes);

    echo implode(' ', $classes);
} */


// Image Aspect Ratio
function get_img_aspect_ratio(string $image_path, string $format = 'percentage'): float
{
    list($width, $height) = getimagesize($image_path);

    switch ($format) {
        case 'percentage':
            $aspect_ratio = ($height / $width) * 100;
            break;
        case 'h/w':
            $aspect_ratio = $height / $width;
            break;
        case 'w/h':
            $aspect_ratio = $width / $height;
            break;
        default:
            throw new \InvalidArgumentException('\'' . $format . '\' is not a valid format. Acceptable values are \'percentage\', \'w/h\' or \'h/w\'.');
    }

    return round($aspect_ratio, 4);
}

function img_aspect_ratio(string $image_path, string $format = 'percentage'): void
{
    echo get_img_aspect_ratio($image_path, $format);
}


// Image Orientation
function get_img_orientation(string $image_path): string
{
    $aspect_ratio = get_img_aspect_ratio($image_path);

    if ($aspect_ratio > 100) {
        return 'portrait';
    } elseif ($aspect_ratio === 100.0) {
        return 'square';
    } else{
        return 'landscape';
    }
}

function img_orientation(string $image_path): void
{
    echo get_img_orientation($image_path);
}

