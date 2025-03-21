<?php

namespace App\Http\Livewire\Country;

use App\Models\Country;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public Country $country;

    public array $mediaToRemove = [];

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
                ->update(['model_id' => $this->country->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    public function mount(Country $country)
    {
        $this->country          = $country;
        $this->mediaCollections = [

            'country_image' => $country->image,
        ];
    }

    public function render()
    {
        return view('livewire.country.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->country->save();
        $this->syncMedia();

        return redirect()->route('admin.countries.index');
    }

    protected function rules(): array
    {
        return [
            'country.name' => [
                'string',
                'required',
            ],
            'mediaCollections.country_image' => [
                'array',
                'nullable',
            ],
            'mediaCollections.country_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
        ];
    }
}
