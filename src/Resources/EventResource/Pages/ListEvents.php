<?php

namespace Buildix\Timex\Resources\EventResource\Pages;

use Buildix\Timex\Traits\TimexTrait;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use Buildix\Timex\Resources\EventResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class ListEvents extends ListRecords
{
    use TimexTrait;
    protected static string $resource = EventResource::class;

    protected function getActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    protected function getTableQuery(): Builder
    {
        if (in_array('participants',Schema::getColumnListing(self::getEventTableName()))){
            return parent::getTableQuery()
                ->where('organizer','=',Auth::id())
                ->orWhereJsonContains('participants', Auth::id());
        }else{
            return parent::getTableQuery();
        }
    }
}
