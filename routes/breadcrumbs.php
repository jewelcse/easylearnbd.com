<?php

// Home
Breadcrumbs::for('index', function ($trail) {
$trail->push('Home', url('/'));
});

Breadcrumbs::for('title', function ($trail, $title) {
    $trail->parent('index');
    $trail->push($title->title, url('category', $title->id));
});



