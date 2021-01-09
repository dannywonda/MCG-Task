<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\Tag;

class Search extends Component
{
    public $query;
    public $results;
    public $highlightIndex;

    public function mount()
    {
        $this->query = '';
        $this->results = [];
        $this->highlightIndex = 0;
    }

    public function incrementHighlight()
    {
        if ($this->highlightIndex === count($this->results) + 1)
        {
            $this->highlightIndex = 0;
        }
        $this->highlightIndex++;
    }

    public function decrementHighlight()
    {
        if ($this->highlightIndex === 0)
        {
            $this->highlightIndex = count($this->results) - 1;
        }
        $this->highlightIndex--;
    }

    public function selectCourse()
    {
        $result = $this->results[$this->highlightIndex] ?? null;
        $link = $result['categories'] === 'tag' ? 'search' : 'show';
        $result ? $this->redirect(route($link, $result['slug'])) : null;
    }

    public function resetValues()
    {
        $this->reset(['query', 'courses', 'highlightIndex']);
    }

    public function updatedQuery()
    {
        $searchByName = Course::searchByName($this->query);
        $searchTags   = Tag::search($this->query);

        $this->results = array_merge($searchByName, $searchTags);
 
    }

    public function render()
    {
        return view('livewire.search');
    }
}
