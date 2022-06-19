<?php

namespace App\Providers;

use App\Models\City;
use App\Models\CustomBlock;
use App\Models\EmailTemplate;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\MailingList;
use App\Models\Organizer;
use App\Models\Review;
use App\Models\Role;
use App\Models\Tag;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Venue;
use App\Policies\CityPolicy;
use App\Policies\CustomBlockPolicy;
use App\Policies\EmailTemplatePolicy;
use App\Policies\EventPolicy;
use App\Policies\GalleryPolicy;
use App\Policies\MailingListPolicy;
use App\Policies\OrganizerPolicy;
use App\Policies\ReviewPolicy;
use App\Policies\RolePolicy;
use App\Policies\TagPolicy;
use App\Policies\TeacherPolicy;
use App\Policies\UserPolicy;
use App\Policies\VenuePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class          => UserPolicy::class,
        Role::class          => RolePolicy::class,
        City::class          => CityPolicy::class,
        Venue::class         => VenuePolicy::class,
        Teacher::class       => TeacherPolicy::class,
        Organizer::class     => OrganizerPolicy::class,
        Review::class        => ReviewPolicy::class,
        Gallery::class       => GalleryPolicy::class,
        CustomBlock::class   => CustomBlockPolicy::class,
        EmailTemplate::class => EmailTemplatePolicy::class,
        MailingList::class   => MailingListPolicy::class,
        Tag::class           => TagPolicy::class,
        Event::class         => EventPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //
    }
}
