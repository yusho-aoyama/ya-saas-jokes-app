<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsStringable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class joke extends Model
{
    /** @use HasFactory<\Database\Factories\JokeFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'content',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'title' => AsStringable::class,
            'content' => AsStringable::class,
        ];
    }

    /**
     * Return the slug version of the joke title
     *
     */
    public function slug(): null|string
    {
        return $this->title->slug();
    }

    public function snippet(int $words = 5): null|string
    {
        if (is_null($this->content)) {
            return "";
        }
        return ($this->content->words($words));
    }


}
