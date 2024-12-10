<?php

namespace App\Livewire;

use App\Models\Testimonio;
use Livewire\Component;
use Livewire\WithPagination;

class Testimonios extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }
    public function render()
    {
        
        return view('livewire.testimonios', [
            'testimonios' => Testimonio::search($this->search)
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate(10),
        ]);
    }
}
