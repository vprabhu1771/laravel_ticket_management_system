<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\View;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

use App\Models\Category;

class AdminMenuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Event::listen(BuildingMenu::class, function (BuildingMenu $event) {

            $categoriesCount = Category::count();

            // Navbar items:
            $event->menu->add(
                [
                    'type' => 'navbar-search',
                    'text' => 'search',
                    'topnav_right' => true,
                ],

                [
                    'type' => 'fullscreen-widget',
                    'topnav_right' => true,
                ],
            );

            // Sidebar items:
            $event->menu->add(
                [
                    'type' => 'sidebar-menu-search',
                    'text' => 'search',
                ],
            );

            // Dashboard Menu
            $event->menu->add(
                [
                    'text' => 'Dashboard',
                    'icon' => 'fas fa-fw fa-tachometer-alt',
                    'url'  => 'dashboard',                    
                ],
            );

            // Sidebar items:
            $event->menu->add(
                [
                    'text' => 'Category',
                    'url' => 'categories',
                    'icon' => 'fas fa-tags',
                    'label' => $categoriesCount,
                    'label_color' => 'info',
                ],
                [
                    'text' => 'pages',
                    'url' => 'admin/pages',
                    'icon' => 'far fa-fw fa-file',
                    'label' => 4,
                    'label_color' => 'success',
                ],
                ['header' => 'account_settings'],
                [
                    'text' => 'profile',
                    'url' => 'admin/settings',
                    'icon' => 'fas fa-fw fa-user',
                ],
                [
                    'text' => 'change_password',
                    'url' => 'admin/settings',
                    'icon' => 'fas fa-fw fa-lock',
                ],
                [
                    'text' => 'multilevel',
                    'icon' => 'fas fa-fw fa-share',
                    'submenu' => [
                        [
                            'text' => 'level_one',
                            'url' => '#',
                        ],
                        [
                            'text' => 'level_one',
                            'url' => '#',
                            'submenu' => [
                                [
                                    'text' => 'level_two',
                                    'url' => '#',
                                ],
                                [
                                    'text' => 'level_two',
                                    'url' => '#',
                                    'submenu' => [
                                        [
                                            'text' => 'level_three',
                                            'url' => '#',
                                        ],
                                        [
                                            'text' => 'level_three',
                                            'url' => '#',
                                        ],
                                    ],
                                ],
                            ],
                        ],
                        [
                            'text' => 'level_one',
                            'url' => '#',
                        ],
                    ],
                ],
                ['header' => 'labels'],
                [
                    'text' => 'important',
                    'icon_color' => 'red',
                    'url' => '#',
                ],
                [
                    'text' => 'warning',
                    'icon_color' => 'yellow',
                    'url' => '#',
                ],
                [
                    'text' => 'information',
                    'icon_color' => 'cyan',
                    'url' => '#',
                ],
            );
        });
    }
}