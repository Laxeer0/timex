<?php

namespace Buildix\Timex\Resources\EventResource\Pages;

use Buildix\Timex\Traits\TimexTrait;
use Filament\Actions\DeleteAction;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;
use Buildix\Timex\Resources\EventResource;

class EditEvent extends EditRecord
{
    use TimexTrait;
    protected static string $resource = EventResource::class;

    public function form(Form $form): Form
    {
        return $form->schema(self::getResource()::getCreateEditForm());
    }

    protected function getActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
