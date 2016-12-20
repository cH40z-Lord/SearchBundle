<?php

namespace Becklyn\SearchBundle\DependencyInjection;


use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;


class SearchBundleExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new SearchBundleConfiguration();
        $config = $this->processConfiguration($configuration, $configs);

        // load main services.yml
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        // set config for metadata analysis
        // $container->getDefinition("search.metadata.analysis")
        //     ->replaceArgument(0, $config["filters"])
        //     ->replaceArgument(1, $config["analyzers"]);
        //
        // // set config for elasticsearch client
        // $container->getDefinition("search.elasticsearch.client")
        //     ->replaceArgument(0, $config["server"])
        //     ->replaceArgument(1, $config["index"]);
        //
        // // set config for elasticsearch client
        // $container->getDefinition("search.metadata.language")
        //     ->replaceArgument(0, $config["index"])
        //     ->replaceArgument(1, $config["languages"]);
    }
}