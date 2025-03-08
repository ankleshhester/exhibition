<?php

namespace App\Http\Livewire\LinkStatistic;

use App\Models\Link;
use App\Models\LinkStatistic;
use App\Models\Visitor;
use Livewire\Component;

class Create extends Component
{
    public array $listsForFields = [];

    public LinkStatistic $linkStatistic;

    public function mount(LinkStatistic $linkStatistic)
    {
        $this->linkStatistic = $linkStatistic;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.link-statistic.create');
    }

    public function submit()
    {
        $this->validate();

        $this->linkStatistic->save();

        return redirect()->route('admin.link-statistics.index');
    }

    protected function rules(): array
    {
        return [
            'linkStatistic.link_id' => [
                'integer',
                'exists:links,id',
                'nullable',
            ],
            'linkStatistic.ip_address' => [
                'string',
                'nullable',
            ],
            'linkStatistic.visitor_id' => [
                'integer',
                'exists:visitors,id',
                'nullable',
            ],
            'linkStatistic.action' => [
                'string',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['link']    = Link::pluck('name', 'id')->toArray();
        $this->listsForFields['visitor'] = Visitor::pluck('name', 'id')->toArray();
    }
}
