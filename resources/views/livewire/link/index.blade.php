<div>
    @can('link_show')
    <div class="card-controls sm:flex">

        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('link_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Link" format="csv" />
                <livewire:excel-export model="Link" format="xlsx" />
                <livewire:excel-export model="Link" format="pdf" />
            @endif
        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>

    @endcan

    <div wire:loading.delay>
        <i class="fas fa-spinner fa-spin"></i> Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        @can('link_show')
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.link.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        @endcan
                        <th>
                            {{ trans('cruds.link.fields.name') }}
                            @include('components.table.sort', ['field' => 'name'])
                        </th>
                        {{-- <th>
                            {{ trans('cruds.link.fields.url') }}
                            @include('components.table.sort', ['field' => 'url'])
                        </th> --}}
                        <th>
                            {{ trans('cruds.link.fields.file') }}
                        </th>

                        @can('link_show')
                        <th>
                            {{ trans('cruds.link.fields.link_category') }}
                            @include('components.table.sort', ['field' => 'link_category.name'])
                        </th>
                        @endcan
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($links as $link)
                        <tr>
                            @can('link_show')
                            <td>
                                <input type="checkbox" value="{{ $link->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $link->id }}
                            </td>
                            @endcan
                            <td>
                                {{ $link->name }}
                            </td>
                            {{-- <td>
                                {{ $link->url }}
                            </td> --}}
                            <td>
                                {{-- @foreach($link->file as $key => $entry)
                                    <a class="link-light-blue" href="#" wire:click="download({{ $link->id }})">
                                        <i class="far fa-file"></i> Download
                                    </a>
                                @endforeach --}}
                                @foreach($link->file as $key => $entry)
                                    <a class="link-light-blue" href="#" wire:click.prevent="trackView({{ $entry['id']}})">
                                        <i class="far fa-eye"></i> View File
                                    </a>
                                @endforeach
                                @foreach($link->file as $key => $entry)
                                    <a class="link-light-blue" href="#" wire:click.prevent="download({{ $entry['id']  }})">
                                        <i class="far fa-file">
                                        </i>
                                        Download
                                    </a>
                                @endforeach
                            </td>
                            @can('link_show')
                            <td>
                                @if($link->linkCategory)
                                    <span class="badge badge-relationship">{{ $link->linkCategory->name ?? '' }}</span>
                                @endif
                            </td>
                            @endcan
                            <td>
                                <div class="flex justify-end">

                                    @can('link_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.links.edit', $link) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('link_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $link->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $links->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.link-light-blue').forEach(link => {
            link.addEventListener('touchstart', function () {
                this.click();
            });
        });
    });
</script>
@endpush

