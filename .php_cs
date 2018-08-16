<?php

$rules = [
    '@Symfony' => true,
    '@DoctrineAnnotation' => true,
    'array_syntax' => ['syntax' => 'short'],
    'no_short_echo_tag' => true,
    'no_unused_imports' => true,
    'ordered_class_elements' => true,
    'ordered_imports' => true,
    'phpdoc_order' => true,
];

$finder = PhpCsFixer\Finder::create()
    ->exclude(['node_modules', 'var', 'vendor', 'web'])
    ->notPath('#(^|/)_.+(/|$)#')
    ->in(__DIR__);

$cacheDir = getenv('TRAVIS')
    ? getenv('HOME').'/.php-cs-fixer'
    : __DIR__;

return PhpCsFixer\Config::create()
    ->setCacheFile($cacheDir.'/.php_cs.cache')
    ->setRules($rules)
    ->setFinder($finder);
