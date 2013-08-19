<?php
/*
 * This file is part of the LightCMSTinyMCEBundle package.
 *
 * (c) Fulgurio <http://fulgurio.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fulgurio\LightCMSTinyMCEBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('fulgurio_light_cms_tiny_mce');
        $rootNode
            ->addDefaultsIfNotSet()
            ->children()
                ->scalarNode('admin_footer')->defaultValue('FulgurioLightCMSTinyMCEBundle::bottom.html.twig')->end()
            ->end()
            ->children()
                ->scalarNode('admin_top_media')->defaultValue('FulgurioLightCMSTinyMCEBundle::popupTop.html.twig')->end()
            ->end()
            ->children()
                ->scalarNode('admin_bottom_media')->defaultValue('FulgurioLightCMSTinyMCEBundle::popupBottom.html.twig')->end()
            ->end()
            ->children()
            ->arrayNode('config')
                ->addDefaultsIfNotSet()
                ->children()
                    ->scalarNode('content_css')
                        ->defaultValue('bundles/fulguriolightcms/css/bootstrap.min.css')
                    ->end()
                    ->scalarNode('theme')
                        ->defaultValue('advanced')
                    ->end()
                    ->scalarNode('skin')
                        ->defaultValue('default')
                    ->end()
                    ->scalarNode('plugins')
                        ->defaultValue('autolink,lists,spellchecker,style,layer,table,advhr,advimage,advlink,emotions,iespell,twitterbootstrappopup,media,contextmenu,paste,directionality,noneditable,visualchars,nonbreaking,xhtmlxtras,template')
                    ->end()
                    ->scalarNode('theme_advanced_buttons1')
                        ->defaultValue('bold,italic,underline,strikethrough,|,bullist,numlist,|,outdent,indent,blockquote,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect')
                    ->end()
                    ->scalarNode('theme_advanced_buttons2')
                        ->defaultValue('paste,pastetext,pasteword,|,link,unlink,anchor,image,cleanup,code,|,forecolor,backcolor')
                    ->end()
                    ->scalarNode('theme_advanced_buttons3')
                        ->defaultValue('tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions')
                    ->end()
                ->end()
            ->end()
        ->end()
        ;
        return $treeBuilder;
    }
}
