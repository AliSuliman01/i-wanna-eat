<?php

namespace App\Providers;

use App\Domain\General\Languages\Model\Language;
use App\Domain\General\Languages\Observer\LanguageObserver;
use App\Domain\General\Regions\Regions\Model\Region;
use App\Domain\General\Regions\Regions\Observer\RegionObserver;
use App\Domain\General\Regions\RegionTranslations\Model\RegionTranslation;
use App\Domain\General\Regions\RegionTranslations\Observer\RegionTranslationObserver;
use App\Domain\General\Regions\RegionTypes\Model\RegionType;
use App\Domain\General\Regions\RegionTypes\Observer\RegionTypeObserver;
use App\Domain\General\Regions\RegionTypeTranslations\Model\RegionTypeTranslation;
use App\Domain\General\Regions\RegionTypeTranslations\Observer\RegionTypeTranslationObserver;
use App\Domain\General\Roles\Roles\Model\Role;
use App\Domain\General\Roles\Roles\Observer\RoleObserver;
use App\Domain\General\Users\Users\Model\User;
use App\Domain\General\Users\Users\Observer\UserObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Region::observe(RegionObserver::class);
        RegionTranslation::observe(RegionTranslationObserver::class);
        RegionType::observe(RegionTypeObserver::class);
        RegionTypeTranslation::observe(RegionTypeTranslationObserver::class);
        Language::observe(LanguageObserver::class);
        Role::observe(RoleObserver::class);
    }
}
