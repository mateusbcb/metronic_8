<?php

use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Spatie\Permission\Models\Role;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('dashboard'));
});

// Home > Dashboard
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Dashboard', route('dashboard'));
});

// Account
Breadcrumbs::for('account', function (BreadcrumbTrail $trail) {
    $trail->push('Account', route('site_account.my_profile'));
});

// Home > Dashboard > User Management
Breadcrumbs::for('admin_user_management.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('User Management', route('admin_user_management.users.index'));
});

// Home > Dashboard > User Management > Users
Breadcrumbs::for('admin_user_management.users.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin_user_management.index');
    $trail->push('Users', route('admin_user_management.users.index'));
});

// Home > Dashboard > User Management > Users > [User]
Breadcrumbs::for('admin_user_management.users.show', function (BreadcrumbTrail $trail, User $user) {
    $trail->parent('admin_user_management.users.index');
    $trail->push(ucwords($user->name), route('admin_user_management.users.show', $user));
});

// Home > Dashboard > User Management > Roles
Breadcrumbs::for('admin_user_management.roles.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin_user_management.index');
    $trail->push('Roles', route('admin_user_management.roles.index'));
});

// Home > Dashboard > User Management > Roles > [Role]
Breadcrumbs::for('admin_user_management.roles.show', function (BreadcrumbTrail $trail, Role $role) {
    $trail->parent('admin_user_management.roles.index');
    $trail->push(ucwords($role->name), route('admin_user_management.roles.show', $role));
});

// Home > Dashboard > User Management > Permission
Breadcrumbs::for('admin_user_management.permissions.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin_user_management.index');
    $trail->push('Permissions', route('admin_user_management.permissions.index'));
});
