<?php

namespace App\Http\Livewire\Visitor;

use App\Models\Country;
use App\Models\Visitor;
use Livewire\Component;

class Create extends Component
{
    public Visitor $visitor;

    public array $listsForFields = [];

    public function mount(Visitor $visitor)
    {
        $this->visitor = $visitor;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.visitor.create');
    }

    public function submit()
    {
        $this->validate();

        $this->visitor->save();

        return redirect()->route('admin.visitors.index');
    }

    protected function rules(): array
    {
        return [
            'visitor.name' => [
                'string',
                'required',
            ],
            'visitor.email' => [
                'email:rfc',
                'required',
                'unique:visitors,email',
            ],
            'visitor.mobile' => [
                'string',
                'nullable',
            ],
            'visitor.country_id' => [
                'integer',
                'exists:countries,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['country'] = Country::pluck('name', 'id')->toArray();
    }
}
