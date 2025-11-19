<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsStringable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Joke extends Model
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

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Add a relation that joke has many votes
     *
     */
    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class);
    }

    /**
     * The second relationship allows us to check if the user has voted (like or dislike) a joke.
     *
     */
    public function userVotes(): HasOne
    {
        // This return says ...
        // "For this joke, look at it votes, and retrieve one vote where the User has the same ID as the currently logged-in User"
        return $this->votes()
            ->one()
            ->where('user_id', auth()->id());
    }

}
