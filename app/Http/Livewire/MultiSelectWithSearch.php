<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MultiSelectWithSearch extends Component
{
    public $options = [];
    public $selected = [];
    public $search = '';

    public function mount($options = [], $selected = [])
    {
        $this->options = $options;
        $this->selected = $selected;
    }

    public function render()
    {
        $filteredOptions = $this->filterOptions();

        return view('livewire.multi-select-with-search', [
            'filteredOptions' => $filteredOptions,
        ]);
    }

    public function filterOptions()
    {
        if ($this->search) {
            return collect($this->options)->filter(function ($option) {
                return str_contains(strtolower($option), strtolower($this->search));
            })->toArray();
        }

        return $this->options;
    }
}
