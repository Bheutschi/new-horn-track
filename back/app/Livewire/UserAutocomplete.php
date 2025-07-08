<?php

namespace App\Livewire;

use Livewire\Attributes\Modelable;
use Livewire\Component;

class UserAutocomplete extends Component
{
    #[Modelable]
    public $value;

    public $model;

    public $loans = false;

    public $searchable = [];

    public int $limit = 5;

    public $search = '';

    public $show = false;

    public $placeholder = '';

    public $selected;

    public $display = '';

    public $name = '';

    public $results = [];

    public function mount(): void
    {
        if ($this->value) {
            $result = $this->model::findOrFail($this->value);
            $this->selected = $result;
        }

        $this->results = collect([]);
    }

    public function updatedSearch($value): void
    {
        $query = $this->model::query();

        foreach ($this->searchable as $search) {
            if ($this->loans) {
                $query->where($search, 'like', "%$value%");
            } else {
                $query->where($search, 'like', "%$value%")->whereDoesntHave('currentLoan');
            }
        }

        $this->results = $query->limit($this->limit)->get();
    }

    public function select($result): void
    {
        $result = $this->results->find($result);

        $this->value = $result->id;
        $this->selected = $result;
        $this->show = false;
        $this->reset(['search', 'results']);
    }

    public function render()
    {
        return view('livewire.autocomplete');
    }
}
