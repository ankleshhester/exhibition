<?php

namespace App\Http\Livewire\LinkCategory;

use App\Models\LinkCategory;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public array $mediaToRemove = [];

    public LinkCategory $linkCategory;

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

    public function getMediaCollection($name)
    {
        return $this->mediaCollections[$name];
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
                ->update(['model_id' => $this->linkCategory->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    public function mount(LinkCategory $linkCategory)
    {
        $this->linkCategory     = $linkCategory;
        $this->mediaCollections = [

            'link_category_image' => $linkCategory->image,
        ];
    }

    public function render()
    {
        return view('livewire.link-category.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->linkCategory->save();
        $this->syncMedia();

        return redirect()->route('admin.link-categories.index');
    }

    protected function rules(): array
    {
        return [
            'linkCategory.name' => [
                'string',
                'required',
            ],
            'mediaCollections.link_category_image' => [
                'array',
                'nullable',
            ],
            'mediaCollections.link_category_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
        ];
    }
}
