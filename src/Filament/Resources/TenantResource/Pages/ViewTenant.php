<?php

namespace TomatoPHP\FilamentTenancy\Filament\Resources\TenantResource\Pages;

use Filament\Actions\Action;
use TomatoPHP\FilamentTenancy\Filament\Resources\TenantResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTenant extends ViewRecord
{
    protected static string $resource = TenantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('back')
                ->url(TenantResource::getUrl())
                ->label(__('admin.return'))
                ->color('gray')
                ->icon('heroicon-o-arrow-left'),
            Actions\EditAction::make()
                ->icon('heroicon-s-pencil')
        ];
    }
}
