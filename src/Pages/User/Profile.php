<?php

namespace Wallo\FilamentCompanies\Pages\User;

use Filament\Pages\Page;
use Wallo\FilamentCompanies\Concerns\HasName;

class Profile extends Page
{
    use HasName;

    protected static string $view = 'filament-companies::filament.pages.user.profile';

    protected static bool $shouldRegisterNavigation = false;

    public function getTitle(): string
    {
        return __('filament-companies::default.pages.titles.profile');
    }

    protected function getViewData(): array
    {
        return [
            'user' => auth()->user(),
        ];
    }

    public static function getSlug(): string
    {
        return 'user/profile';
    }
}
