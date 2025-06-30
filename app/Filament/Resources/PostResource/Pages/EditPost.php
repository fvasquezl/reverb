<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Events\PostCreated;
use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;


    protected function getRedirectUrl(): string
    {
        return static::$resource::getUrl('index');
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Post Updated')
            ->body('The Post has been Edited successfully.')
            ->send();
    }


    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    // protected function afterUpdate(): void
    // {
    //     $post = $this->record->fresh();
    //     // Disparar el evento de broadcasting cuando se crea un post
    //     broadcast(new PostCreated($post))->toOthers();
    // }
}
