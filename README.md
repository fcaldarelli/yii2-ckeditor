Yii2 CKEditor
=============
Yii2 CKEditor

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist fabriziocaldarelli/yii2-ckeditor "*"
```

or add

```
"fabriziocaldarelli/yii2-ckeditor": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= $form->field($model, 'textField')->widget(\sfmobile\ext\ckeditor\CKEditor::className(), [
    'pluginOptions' => [
        'height' => '500px'
    ]
]) ?>
```

Using 'pluginOptions', you can pass all configuration parameters to CKEditor plugin. In the example, I set the height at 500px
