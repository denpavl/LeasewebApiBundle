<?php

namespace Dp\LeasewebApiBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * {@inheritDoc}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('leaseweb_api');

        $rootNode
            ->children()
                ->scalarNode('api_url')
                ->isRequired()
                ->cannotBeEmpty()
                ->validate()
                    ->ifTrue(function ($url) {
                        return !filter_var($url, FILTER_VALIDATE_URL);
                    })
                    ->thenInvalid('API URL is invalid URL.')
                ->end()
            ->end()
            ->scalarNode('api_key')
                ->isRequired()
                ->cannotBeEmpty()
            ->end()
            ->booleanNode('as_associative_array')
                ->defaultFalse()
            ->end()
        ;

        return $treeBuilder;
    }
}
