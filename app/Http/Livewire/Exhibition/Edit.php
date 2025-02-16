<?php

namespace App\Http\Livewire\Exhibition;

use App\Models\Exhibition;
use Livewire\Component;

class Edit extends Component
{
    public Exhibition $exhibition;

    public function mount(Exhibition $exhibition)
    {
        $this->exhibition = $exhibition;
    }

    public function render()
    {
        return view('livewire.exhibition.edit');
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
