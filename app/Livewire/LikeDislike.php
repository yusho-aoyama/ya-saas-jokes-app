<?php

namespace App\Livewire;

use Livewire\Component;
// Add use lines
use App\Models\Joke;
use App\Models\Vote;
use Illuminate\Validation\ValidationException;

class LikeDislike extends Component
{
    public Joke $joke;
    public int $likes = 0;
    public int $dislikes = 0;
    // The ?Vote $userVote indicates that the property $userVote is nullable
    // That is it will hold the current user's vote from the model's userVotes relationship when it exists, and null when there is no vote
    public ?Vote $userVote = null;
    // The lastUserVote is the value taken from the userVotes relationship we have in the model.
    public int $lastUserVote = 0;



    // To add a new method, one which activates when the component is added to the page
    public function mount(Joke $joke): void
    {
        $this->joke = $joke;
        // To request the user vote for the chirp, and default the last user vote to zero if
        // the user has not voted on the chirp.
        $this->userVote = $joke->userVotes;
        $this->lastUserVote = $this->userVote->vote ?? 0;
        $this->likes = $joke->likesCount;
        $this->dislikes = $joke->dislikesCount;
    }

    public function like()
    {
        // TODO: Validate Access
        if ($this->hasVoted(1)) {
            // TODO: update vote
            $this->updateVote(0);
        } else {
            // TODO: update vote
            $this->updateVote(1);
        }
    }

    public function dislike()
    {
        // TODO: Validate Access
        if ($this->hasVoted(-1)) {
            // TODO: update vote
            $this->updateVote(0);
        } else {
            // TODO: update vote
            $this->updateVote(-1);
        }
    }

    public function render()
    {
        return view('livewire.like-dislike');
    }

    private function hasVoted(int $val): bool
    {
        return $this->userVote &&
            $this->userVote->vote === $val;
    }


    private function updateVote(int $value): void
    {
        // The method checks to see if there is a vote by this user for this joke.
        // If there is then the vote is updated, otherwise the vote is created.
        if ($this->userVote) {
            // renew if there are existing votes
            $this->userVote->update([
                'vote' => $value
            ]);
        } else {
            // create new
            $this->userVote = $this->joke
                ->votes()
                ->create([
                    'user_id' => auth()->id(),
                    'vote' => $value
                ]);
        }

        // update Like / Dislike number
        $this->setLikesAndDislikesCount($value);

        // keep the latest votes
        $this->lastUserVote = $value;
    }



    private function setLikesAndDislikesCount(int $value): void
    {
        match (true) {
            $this->lastUserVote === 0 && $value === 1 => $this->likes++,
            $this->lastUserVote === 0 && $value === -1 => $this->dislikes++,
            $this->lastUserVote === 1 && $value === 0 => $this->likes--,
            $this->lastUserVote === -1 && $value === 0 => $this->dislikes--,

            $this->lastUserVote === 1 && $value === -1 => call_user_func(
                function () {
                    $this->dislikes++;
                    $this->likes--;
                }
            ),
            $this->lastUserVote === -1 && $value === 1 => call_user_func(
                function () {
                    $this->dislikes--;
                    $this->likes++;
                }
            ),


        };
    }
}
