<?php

namespace SkinDeep\Theme;

use Sober\Controller\Controller;
use SkinDeep\Articles\PostsPreview;

const SD_PRODUCT_COLUMN_COUNT = 3;
const SD_PRODUCT_IMAGE_FACTOR = 3; // Factor to divide card size by to get image size
const SD_PRODUCT_TEMPLATE = 'partials.shop.archive-product';

class ArchiveSdProduct extends Controller
{
    /**
     * @brief      Set template for a single product in the archive
     * @return     Path of template for product
     */
    public function singlePostTemplate()
    {
        return SD_PRODUCT_TEMPLATE;
    }

    /**
     * @brief      Number of columns for the product archive
     * @return     Number of columns
     */
    public function columnCount()
    {
        return SD_PRODUCT_COLUMN_COUNT;
    }

    public static function archiveSizes($post)
    {
        if (has_term('magazines', 'sd-product-cat', $post->ID)) {
            return sprintf(
                '(max-width: %upx) %uvw, (max-width: %upx) %uvw, %upx',
                PostsPreview::BOOTSTRAP_COLUMNS['md'],
                round(100 / SD_PRODUCT_IMAGE_FACTOR),
                PostsPreview::BOOTSTRAP_COLUMNS['xl'],
                round(100 / SD_PRODUCT_COLUMN_COUNT / SD_PRODUCT_IMAGE_FACTOR),
                round(PostsPreview::BOOTSTRAP_COLUMNS['xl'] / SD_PRODUCT_COLUMN_COUNT / SD_PRODUCT_IMAGE_FACTOR)
            );
        } else {
            return PostsPreview::sizes(SD_PRODUCT_COLUMN_COUNT);
        }
    }
}
