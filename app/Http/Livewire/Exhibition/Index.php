<?php

namespace App\Http\Livewire\Exhibition;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\Exhibition;
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
        $this->orderable         = (new Exhibition())->orderable;
    }

    public function render()
    {
        $query = Exhibition::advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $exhibitions = $query->paginate($this->perPage);

        return view('livewire.exhibition.index', compact('exhibitions', 'query'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('exhibition_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Exhibition::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(Exhibition $exhibition)
    {
        abort_if(Gate::denies('exhibition_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exhibition->delete();
    }
}
