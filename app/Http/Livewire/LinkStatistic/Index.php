<?php

namespace App\Http\Livewire\LinkStatistic;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\LinkStatistic;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, WithSorting, WithConfirmation;

    public int $perPage;

    public array $orderable;

    public string $search = '';

    public array $selected = [];

    public array $paginationOptions;

    protected $queryString = [
        'search' => [
            'except' => '',
        ],
        'sortBy' => [
            'except' => 'id',
        ],
        'sortDirection' => [
            'except' => 'desc',
        ],
    ];

    public function getSelectedCountProperty()
    {
        return count($this->selected);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function resetSelected()
    {
        $this->selected = [];
    }

    public function mount()
    {
        $this->sortBy            = 'id';
        $this->sortDirection     = 'desc';
        $this->perPage           = 100;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new LinkStatistic())->orderable;
    }

    public function render()
    {
        $query = LinkStatistic::with(['link', 'visitor'])->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $linkStatistics = $query->paginate($this->perPage);

        return view('livewire.link-statistic.index', compact('linkStatistics', 'query'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('link_statistic_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        LinkStatistic::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(LinkStatistic $linkStatistic)
    {
        abort_if(Gate::denies('link_statistic_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $linkStatistic->delete();
    }
}
