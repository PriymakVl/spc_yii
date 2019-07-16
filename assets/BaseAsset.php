<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class BaseAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/site.css', 'css/template.css', 'css/header_top_row.css', 'css/header.css', 'css/top_menu.css', 'css/sidebar.css', 'css/main.css', 'css/footer.css', 'css/catalog_menu.css', 'css/breadcrumbs.css', 'css/filters.css',
    ];
    public $js = [
        'js/filter_show.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
