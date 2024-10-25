<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'author',
    ];

    public function formattedForApi()
    {
        return [
            'id' => $this->getKey(),
            'image' => route('images.show', ['name' => $this->image]),
            'name' => $this->name,
        ];
    }

    public function formattedDetailForApi()
    {
        return [
            'id' => $this->getKey(),
            'name' => $this->name,
            'description' => $this->description,
            'image' => route('images.show', ['name' => $this->image]),
            'author' => $this->author,
            'viewCount' => $this->view_count,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }
}
