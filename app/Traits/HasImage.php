<?php

namespace App\Traits;

use App\Models\Image;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait HasImage
{
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function addImage(UploadedFile $file, string $collection = 'default')
    {
        $path = $file->store('images/' . $collection, 'public');
        
        return $this->images()->create([
            'path' => $path,
            'collection' => $collection,
            'mime_type' => $file->getMimeType(),
            'size' => $file->getSize(),
        ]);
    }

    public function getImageUrl(string $collection = 'default')
    {
        $image = $this->images()->where('collection', $collection)->latest()->first();
        return $image ? Storage::url($image->path) : null;
    }

    public function deleteImage(string $collection = 'default')
    {
        $image = $this->images()->where('collection', $collection)->latest()->first();
        if ($image) {
            Storage::disk('public')->delete($image->path);
            $image->delete();
        }
    }
} 