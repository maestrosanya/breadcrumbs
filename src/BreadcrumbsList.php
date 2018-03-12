<?php

\Maestro\MaestroAdmin\App\Components\Breadcrumbs\BreadcrumbsManager::register('home', function($breadcrumbs){
    return $breadcrumbs->push('Главная', route('admin'));
});

\Maestro\MaestroAdmin\App\Components\Breadcrumbs\BreadcrumbsManager::register('articles', function($breadcrumbs){
    return $breadcrumbs->push('записи', route('admin.articles'), 'home');
});

\Maestro\MaestroAdmin\App\Components\Breadcrumbs\BreadcrumbsManager::register('edit_articles', function($breadcrumbs, $id){
    return $breadcrumbs->push('редактирование записи', route('admin.articles.edit', ['id' => $id]), 'articles');
});
