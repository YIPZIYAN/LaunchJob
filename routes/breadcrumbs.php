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
    $trail->push('Edit Job: ' . $jobPost->name, route('management.job-post.edit', $jobPost));
});

Breadcrumbs::for('management.job-post.archived', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Archived Job List', route('management.job-post.archived'));
});

Breadcrumbs::for('management.job-post.show', function (BreadcrumbTrail $trail, $jobPost) {
    $trail->parent('dashboard');
    $trail->push($jobPost->name, route('management.job-post.show', $jobPost));
});

Breadcrumbs::for('management.job-application.show', function (BreadcrumbTrail $trail, $jobPost, $user) {
    $trail->parent('management.job-post.show', $jobPost);
    $trail->push($user->name, route('management.job-application.show', [$jobPost, $user]));
});

Breadcrumbs::for('management.job-application.interview.create', function (BreadcrumbTrail $trail,$jobApplication) {
    $trail->parent('dashboard');
    $trail->push('Schedule an interview', route('management.job-application.interview.create',$jobApplication));
});

Breadcrumbs::for('management.interview.index', function (BreadcrumbTrail $trail) {
    $trail->push('Interview', route('management.interview.index'));
});
