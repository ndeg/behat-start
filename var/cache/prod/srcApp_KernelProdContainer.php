<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerYEYRjBE\srcApp_KernelProdContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerYEYRjBE/srcApp_KernelProdContainer.php') {
    touch(__DIR__.'/ContainerYEYRjBE.legacy');

    return;
}

if (!\class_exists(srcApp_KernelProdContainer::class, false)) {
    \class_alias(\ContainerYEYRjBE\srcApp_KernelProdContainer::class, srcApp_KernelProdContainer::class, false);
}

return new \ContainerYEYRjBE\srcApp_KernelProdContainer([
    'container.build_hash' => 'YEYRjBE',
    'container.build_id' => '81151501',
    'container.build_time' => 1585579708,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerYEYRjBE');