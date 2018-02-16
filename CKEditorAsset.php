<?php

namespace sfmobile\ext\ckeditor;

use yii\web\AssetBundle;

/**
 * CKEditorAsset
 * @package sfmobile\ext\ckeditor
 * @version 1.0.0
 */
class CKEditorAsset extends AssetBundle
{
    public $sourcePath = '@npm/ckeditor';

    public $css = [
    ];
    public $js = [
        'ckeditor.js',
    ];
    public $depends = [
    ];
}
