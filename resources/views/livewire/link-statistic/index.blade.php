<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('link_statistic_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="LinkStatistic" format="csv" />
                <livewire:excel-export model="LinkStatistic" format="xlsx" />
                <livewire:excel-export model="LinkStatistic" format="pdf" />
            @endif




        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.linkStatistic.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.linkStatistic.fields.link') }}
                            @include('components.table.sort', ['field' => 'link.name'])
                        </th>
                        <th>
                            {{ trans('cruds.linkStatistic.fields.ip_address') }}
                            @include('components.table.sort', ['field' => 'ip_address'])
                        </th>
                        <th>
                            {{ trans('cruds.linkStatistic.fields.visitor') }}
                            @include('components.table.sort', ['field' => 'visitor.name'])
                        </th>
                        <th>
                            {{ trans('cruds.linkStatistic.fields.action') }}
                            @include('components.table.sort', ['field' => 'action'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($linkStatistics as $linkStatistic)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $linkStatistic->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $linkStatistic->id }}
                            </td>
                            <td>
                                @if($linkStatistic->link)
                                    <span class="badge badge-relationship">{{ $linkStatistic->link->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $linkStatistic->ip_address }}
                            </td>
                            <td>
                                @if($linkStatistic->visitor)
                                    <span class="badge badge-relationship">{{ $linkStatistic->visitor->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $linkStatistic->action }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('link_statistic_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.link-statistics.show', $linkStatistic) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('link_statistic_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.link-statistics.edit', $linkStatistic) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('link_statistic_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $linkStatistic->id }})" wire:loading.attr="disabled">
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
            {{ $linkStatistics->links() }}
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
@endpush