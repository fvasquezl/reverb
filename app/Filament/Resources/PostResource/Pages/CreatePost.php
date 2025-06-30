<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Events\PostCreated;
use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;

    protected function getRedirectUrl(): string
    {
        return static::$resource::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Post created')
            ->body('The Post has been created successfully.');
    }

    // protected function afterCreate(): void
    // {
    //     $post = $this->record->fresh();
    //     // Disparar el evento de broadcasting cuando se crea un post
    //     broadcast(new PostCreated($post))->toOthers();
    // }
}
