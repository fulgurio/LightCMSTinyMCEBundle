LightCMSTinyMCEBundle
=====================

TinyMCE bundle for LightCMS. If you like TinyMCE as wysiwyg editor, this bundle will be usefull for LightCMS.


Installation
------------

First, you need to install LightCMS if you don't already have it. Take a look on [LightCMS bundle projet on github](https://github.com/fulgurio/LightCMSBundle).

After that, you need to install LightCMSTinyMCEBundle. It's easy :

1. Download FulgurioLightCMSBundle and dependent bundles
2. Configure the Autoloader
3. Enable the Bundle
4. Configure your yml files to use TinyMCE as editor
5. Configure TinyMCE as well

### Step 1: Download FulgurioLightCMSBundle and dependent bundles

Add the following lines in your `deps` file (you can do at the same time of DoctrineFixturesBundle):

``` ini
[LightCMSTinyMCEBundle]
    git=http://github.com/fulgurio/LightCMSTinyMCEBundle.git
    target=/bundles/Fulgurio/LightCMSTinyMCEBundle
```

Just download the bundle with vendors loading tool :

``` bash
$ php bin/vendors install
```

### Step 2: Configure the Autoloader

Add the `Fulgurio\\LightCMSTinyMCEBundle` namespace to your autoloader:

``` php
<?php
// app/autoload.php

$loader->registerNamespaces(array(
    // ...
    'Fulgurio\\LightCMSTinyMCEBundle' => __DIR__.'/../vendor/bundles',
));
```

### Step 3: Enable the bundle

Finally, enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Fulgurio\LightCMSTinyMCEBundle\LightCMSTinyMCEBundle(),
    );
}
```

### Step 4: Configure your yml files

You need to configure LightCMSBundle. Add or complete the following lines into your config.yml file
```yaml
fulgurio_light_cms:
    wysiwyg: fulgurio_light_cms_tiny_mce
```

That's all ! Clear your cache, and take a look at admin page of LightCMS. Now you have TinyMCE installed !


### Step 5: Configure TinyMCE as well
Ok, TinyMCE is installed, may be you want to limit options. Just add and change the followed lines :

```yaml
fulgurio_light_cms_tiny_mce:
    config:
        content_css:      bundles/mybundle/css/styles-tinymce.css
        plugins:          autolink,lists,spellchecker,style,layer,table,advhr,advimage,advlink,emotions,iespell,inlinepopups,media,contextmenu,paste,directionality,noneditable,visualchars,nonbreaking,xhtmlxtras,template
        theme_advanced_buttons1: bold,italic,underline,|,bullist,numlist,|,link,unlink,|,image,code,|,formatselect
        theme_advanced_buttons2: 
        theme_advanced_buttons3: 
```

If you know TinyMCE, you know that you can change the loaded plugin and the display of tools.
As you can see, you can add or remove plugins in 
```yaml
        plugins:          autolink,lists,spellchecker,style,layer,table,advhr,advimage,advlink,emotions,iespell,inlinepopups,media,contextmenu,paste,directionality,noneditable,visualchars,nonbreaking,xhtmlxtras,template
```
line and the tools in 
```yaml
        theme_advanced_buttons1: bold,italic,underline,|,bullist,numlist,|,link,unlink,|,image,code,|,formatselect
        theme_advanced_buttons2: 
        theme_advanced_buttons3: 
```

Easy !

Last config : usually, you forget to put the same style of front page into your admin. Here, you can put the same stylesheet into the editor with the line
```yaml
        content_css:      bundles/mybundle/css/styles-tinymce.css
```
where bundles/mybundle/css/styles-tinymce.css is the loaded css file by TinyMCE

If the page link are pink into your content, just put the style class into this file to display link with pink color.
