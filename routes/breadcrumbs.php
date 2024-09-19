<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard'));
});

Breadcrumbs::for('management.job-post.create', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Post a Job', route('management.job-post.create'));
});

Breadcrumbs::for('management.job-post.edit', function (BreadcrumbTrail $trail, $jobPost) {
    $trail->parent('dashboard');
    $trail->push('Edit Job: '.$jobPost->name, route('management.job-post.edit',$jobPost));
});

Breadcrumbs::for('management.job-post.archived', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Archived Job List', route('management.job-post.archived'));
});

Breadcrumbs::for('management.job-post.show', function (BreadcrumbTrail $trail, $jobPost) {
    $trail->parent('dashboard');
    $trail->push($jobPost->name, route('management.job-post.show', $jobPost));
});

Breadcrumbs::for('management.interview.index', function (BreadcrumbTrail $trail) {
    $trail->push('Interview', route('management.interview.index'));
});
