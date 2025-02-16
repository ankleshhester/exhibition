<?php

namespace App\Http\Livewire\Link;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\Link;
use App\Models\LinkStatistic;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

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
        $this->orderable         = (new Link())->orderable;
    }

    public function download($mediaId)
    {
        $media = Media::findOrFail($mediaId); // Retrieve media from Spatie's table

        abort_if(!$media, Response::HTTP_NOT_FOUND, 'File not found');

        // Generate visitor ID if guest
        $visitorId =  session()->get('visitor_id');
        $visitorId = auth()->id() ?? session()->get('visitor_id', uniqid());

        // Track download
        LinkStatistic::create([
            'link_id' => $media->model_id,
            'action' => 'download',
            'ip_address' => request()->ip(),
            'visitor_id' => $visitorId,
        ]);

        // Force file download
        return response()->download($media->getPath(), $media->file_name);
    }

    public function trackView(Link $link)
    {
        LinkStatistic::create([
            'link_id' => $link->id,
            'action' => 'view',
            'ip_address' => request()->ip(),
            'visitor_id' => auth()->id() ?? null,
        ]);
    }

    public function render()
    {
        $query = Link::with(['linkCategory'])->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $links = $query->paginate($this->perPage);

        return view('livewire.link.index', compact('links', 'query'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('link_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Link::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(Link $link)
    {
        abort_if(Gate::denies('link_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $link->delete();
    }
}
