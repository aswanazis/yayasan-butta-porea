<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Program;
use App\Models\Category;
use App\Models\Article;
use App\Models\EducationalMaterial;
use App\Models\TeamMember;
use App\Observers\ProgramObserver;
use App\Observers\CategoryObserver;
use App\Observers\ArticleObserver;
use App\Observers\EducationalMaterialObserver;
use App\Observers\TeamMemberObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Program::observe(ProgramObserver::class);
        Category::observe(CategoryObserver::class);
        Article::observe(ArticleObserver::class);
        EducationalMaterial::observe(EducationalMaterialObserver::class);
        TeamMember::observe(TeamMemberObserver::class);
    }
}
