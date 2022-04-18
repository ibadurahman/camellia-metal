<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

// Daily Report
Breadcrumbs::for('dailyReport.index', function ($trail) {
    $trail->push('Home', route('home'));
    $trail->push('Daily Report', route('dailyReport.index'));
});

// Workorder
Breadcrumbs::for('workorder.index', function ($trail) {
    $trail->push('Home', route('home'));
    $trail->push('Workorder', route('workorder.index'));
});

// OEE Details
Breadcrumbs::for('workorder.details', function ($trail) {
    $trail->push('Home', route('home'));
    $trail->push('Workorder', route('workorder.index'));
    $trail->push('Workorder Detail', route('workorder.details'));
});

// User Index
Breadcrumbs::for('admin.user.index', function ($trail) {
    $trail->push('Home', route('home'));
    $trail->push('User', route('admin.user.index'));
});

// User Create
Breadcrumbs::for('admin.user.create', function ($trail) {
    $trail->push('Home', route('home'));
    $trail->push('User', route('admin.user.index'));
    $trail->push('Create User', route('admin.user.create'));
});

// User Edit
Breadcrumbs::for('admin.user.edit', function ($trail, $user) {
    $trail->push('Home', route('home'));
    $trail->push('User', route('admin.user.index'));
    $trail->push('Edit User', route('admin.user.edit', $user));
});

// Product Index
Breadcrumbs::for('admin.product.index', function ($trail) {
    $trail->push('Home', route('home'));
    $trail->push('Product', route('admin.product.index'));
});

// Workorder Index
Breadcrumbs::for('admin.workorder.index', function ($trail) {
    $trail->push('Home', route('home'));
    $trail->push('Workorder', route('admin.workorder.index'));
});

// Workorder Create
Breadcrumbs::for('admin.workorder.create', function ($trail) {
    $trail->push('Home', route('home'));
    $trail->push('Workorder', route('admin.workorder.index'));
    $trail->push('Create Workorder', route('admin.workorder.create'));
});

// Workorder Edit
Breadcrumbs::for('admin.workorder.edit', function ($trail, $workorder) {
    $trail->push('Home', route('home'));
    $trail->push('Workorder', route('admin.workorder.index'));
    $trail->push('Edit Workorder', route('admin.workorder.edit', $workorder));
});

// Production Index
Breadcrumbs::for('admin.production.index', function ($trail) {
    $trail->push('Home', route('home'));
    $trail->push('Production', route('admin.production.index'));
});


// Smelting Create
Breadcrumbs::for('admin.smelting.create', function ($trail) {
    $trail->push('Home', route('home'));
    $trail->push('Smelting', route('admin.smelting.index'));
    $trail->push('Create Smelting', route('admin.smelting.create'));
});

// OEE Index
Breadcrumbs::for('admin.oee.index', function ($trail) {
    $trail->push('Home', route('home'));
    $trail->push('Oee', route('admin.oee.index'));
});


