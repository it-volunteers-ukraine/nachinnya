<?php

// The helper class to work with the Wordpress images
class ImageHelper {
    // Returns the image src from the image array
    protected static function get_image_src($image) {
        return esc_url($image['sizes']['thumbnail']);
    }

    // Returns the image srcset from the image array
    protected static function get_image_srcset($image) {
        // Retrieving the available image sizes
        $sizes = get_intermediate_image_sizes();
        // For each of them try to add the srcset
        $srcsets = [];
        foreach ($sizes as $size) {
            // Checking whether the size data exists in the provided $image
            if (array_key_exists($size, $image['sizes']) && array_key_exists("$size-width", $image['sizes'])) {
                $srcsets[] = esc_url($image['sizes'][$size]) . ' ' . $image['sizes']["$size-width"] . 'w';
            }
        }
        // Joining the all scrsets into the one string divided by the comma
        $s = implode(', ', $srcsets);
        return $s;
    }

    // Returns the image tag for the provided Wordpress image array and the image class
    public static function get_image_tag($image, $class, $sizes = "(max-width: 600px) 100vw, (max-width: 1024px) 50vw, 1024px") {
        //
        $image_src = ImageHelper::get_image_src($image);
        $image_srcset = ImageHelper::get_image_srcset($image);
        $image_alt = esc_attr($image['alt']);

        //
        $s = <<<BLOCK
            <img
                class="$class"
                src="$image_src" 
                srcset="$image_srcset" 
                sizes="$sizes" 
                alt="$image_alt"
            >
        BLOCK;

        return $s;
    }

    // Returns the url to the image in the highest size
    public static function get_highest_size($image)
    {
        // Retrieving the available image sizes
        $sizes = get_intermediate_image_sizes();
        // Searching for the largest image size
        $largest_size = 0;
        $largest_url = '';
        foreach ($sizes as $size) {
            // Checking whether the size data exists in the provided $image
            if (array_key_exists($size, $image['sizes']) && array_key_exists("$size-width", $image['sizes'])) {
                $width = $image['sizes']["$size-width"];
                if ($width > $largest_size) {
                    $largest_size = $width;
                    $largest_url = $image['sizes'][$size];
                }
            }
        }

        return $largest_url;
    }
}