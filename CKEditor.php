<?php
namespace sfmobile\ext\ckeditor;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\InputWidget as YiiInputWidget;

/**
 * CKEditor
 * @package sfmobile\ext\ckeditor
 * @version 1.0.0
 */
class CKEditor extends YiiInputWidget
{
    /**
     * @var array the default HTML attributes for the input tag.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $defaultOptions = [];

    /**
     * @var array widget plugin options.
     */
    public $defaultPluginOptions = [];

    /**
     * @var array widget plugin options.
     */
    public $pluginOptions = [];

    /**
     * @var array widget JQuery events. You must define events in `event-name => event-function` format. For example:
     *
     * ~~~
     * pluginEvents = [
     *     'change' => 'function() { log("change"); }',
     *     'open' => 'function() { log("open"); }',
     * ];
     * ~~~
     */
    public $pluginEvents = [];

    /**
    * Initialize the options
    */
    private function initOptions()
    {
        $this->pluginOptions = ArrayHelper::merge($this->defaultPluginOptions, $this->pluginOptions);
        $this->options = ArrayHelper::merge($this->defaultOptions, $this->options);
    }

    /**
    * Initialize javascript code
    */
    private function initJS()
    {
        $jsPluginOptions = json_encode($this->pluginOptions);

        $id = $this->options['id'];
        $this->getView()->registerJs("
            $(function() {
                CKEDITOR.replace( '{$id}', $jsPluginOptions );
            })
        ");
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        // Load asset
        CKEditorAsset::register($this->getView());

        parent::init();

        $this->initOptions();

        $this->initJS();
    }

    public function run()
    {
        if ($this->hasModel()) {
            return Html::activeTextArea($this->model, $this->attribute, $this->options);
        }
        return Html::textArea($this->name, $this->value, $this->options);
    }
}
