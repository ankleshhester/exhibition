<?php

namespace App\Http\Livewire\Exhibition;

use App\Models\Exhibition;
use Livewire\Component;

class Create extends Component
{
    public Exhibition $exhibition;

    public function mount(Exhibition $exhibition)
    {
        $this->exhibition         = $exhibition;
        $this->exhibition->active = false;
    }

    public function render()
    {
        return view('livewire.exhibition.create');
    }

    public function submit()
    {
        $this->validate();

        $this->exhibition->save();

        return redirect()->route('admin.exhibitions.index');
    }

    protected function rules(): array
    {
        return [
            'exhibition.name' => [
                'string',
                'required',
            ],
            'exhibition.description' => [
                'string',
                'nullable',
            ],
            'exhibition.active' => [
                'boolean',
            ],
        ];
    }
}
