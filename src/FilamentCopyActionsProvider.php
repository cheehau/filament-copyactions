<?php

namespace Webbingbrasil\FilamentCopyActions;

use Filament\Facades\Filament;
use Illuminate\Support\HtmlString;
use Webbingbrasil\FilamentCopyActions\Forms\Actions\CopyAction;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentCopyActionsProvider extends PackageServiceProvider
{
    public static string $name = 'filament-copyactions';

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasViews();
    }

    public function packageBooted(): void
    {
        CopyAction::configureUsing(fn (CopyAction $action) => $action->copyable(fn ($component) => $component->getState()));
    }
}
