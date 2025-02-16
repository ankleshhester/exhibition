<?php

namespace App\Http\Livewire\Link;

use App\Models\Link;
use App\Models\LinkCategory;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Create extends Component
{
    public Link $link;

    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public array $mediaCollections = [];

    public function addMedia($media): void
    {
        $this->mediaCollections[$media['collection_name']][] = $media;
    }

    public function removeMedia($media): void
    {
        $collection = collect($this->mediaCollections[$media['collection_name']]);

        $this->mediaCollections[$media['collection_name']] = $collection->reject(fn ($item) => $item['uuid'] === $media['uuid'])->toArray();

        $this->mediaToRemove[] = $media['uuid'];
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
                ->update(['model_id' => $this->link->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    public function mount(Link $link)
    {
        $this->link = $link;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.link.create');
    }

    public function submit()
    {
        $this->validate();

        $this->link->save();
        $this->syncMedia();

        return redirect()->route('admin.links.index');
    }

    protected function rules(): array
    {
        return [
            'link.name' => [
                'string',
                'required',
            ],
            'link.url' => [
                'string',
                'nullable',
            ],
            'mediaCollections.link_file' => [
                'array',
                'nullable',
            ],
            'mediaCollections.link_file.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'link.link_category_id' => [
                'integer',
                'exists:link_categories,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['link_category'] = LinkCategory::pluck('name', 'id')->toArray();
    }
}
