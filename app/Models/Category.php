<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsStringable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Add fillable fields
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'description',
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
     * Raftopoulos, H. (2025, January 8). String Manipulation Made
     * Easy with Laravel’s AsStringable Cast - Laravel News. Laravel
     * News. https://laravelnews.com/asstringable
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'title' => AsStringable::class,
            'description' => AsStringable::class,
        ];
    }

    /**
     * Return the slug version of the category title
     *
     */
    public function slug(): null|string
    {
        return $this->title->slug();
    }

    public function snippet(int $words = 5): null|string
    {
        if (is_null($this->description)) {
            return "";
        }
        return ($this->description->words($words));
    }

    /**
     *  A Category can belong to many jokes
     *  belongsToMany() because this is a Many-to-Many relationship
     *  - One joke can have multiple Categories
     *  - One category can be assigned to multiple jokes
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function jokes()
    {
        return $this->belongsToMany(Joke::class, 'category_joke');
    }


}
