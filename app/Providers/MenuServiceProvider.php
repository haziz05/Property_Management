<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class MenuServiceProvider extends ServiceProvider
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
        Event::listen(BuildingMenu::class, function(BuildingMenu $event){
            if(Auth::check()) {
                if(Auth::user()->account === 'Admin'){
                    $event->menu->add(
                        [
                            'text' => 'Dashboard',
                            'url' => '/dashboard',
                            'icon' => 'fas fa-tablet-alt'
                        ],

                        [
                            'text'    => 'Properties',
                            'icon'    => 'fas fa-home',
                            'submenu' => [
                                [
                                    'text' => 'Listings',
                                    'url'  => 'listings', // or use route('listings')
                                ],
                                [
                                    'text' => 'Maintenance Issues',
                                    'url'  => 'maintenance', // or route('maintenance')
                                ],
                                [
                                    'text' => 'Edit Listing',
                                    'url'  => 'edit', // or route('editScreen')
                                ],
                            ],
                        ],

                        [
                            'text'    => 'Tenants',
                            'icon'    => 'fas fa-user',
                            'submenu' => [
                                [
                                    'text' => 'Current Tenants',
                                    'url'  => 'currentTenant', // or route('currentTenant')
                                ],
                                [
                                    'text' => 'Edit Tenants',
                                    'url'  => 'editTenant', // or route('editTScreen')
                                ],
                            ],
                        ],

                        [
                            'text'    => 'Upload Document',
                            'icon'    => 'fas fa-upload',
                            'submenu' => [
                                [
                                    'text' => 'Tenant',
                                    'url'  => 'showTenantUpload', // or route('showTenantUpload')
                                ],
                                [
                                    'text' => 'Maintenance',
                                    'url'  => 'showMaintenanceUpload', // or route('showMaintenanceUpload')
                                ],
                                [
                                    'text' => 'Property',
                                    'url'  => 'showPropertyUpload', // or route('showPropertyUpload')
                                ],
                            ],
                        ],

                        [
                            'text'    => 'Select Document',
                            'url'     => '/showSelect',
                            'icon'    => 'fas fa-file-alt',
                
                        ]
                    );
                } elseif (Auth::user()->account === 'Tenant'){
                    $event->menu->add(
                        [
                            'text'=> 'My Dashboard',
                            'url' => '/dashboardT',
                            'icon' => 'fas fa-tablet-alt'
                        ],

                        [
                            'text' => 'My Lease',
                            'url' => '/my-lease',
                            'icon' => 'fas fa-money-bill'
                        ],

                        [
                            'text' => 'My Maintenance',
                            'url' => '/myMaintenance',
                            'icon' => 'fas fa-brush'
                        ]

                    );
                }
            }
        });
    }
}
