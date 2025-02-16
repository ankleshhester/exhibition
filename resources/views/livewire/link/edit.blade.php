<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('link.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.link.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="link.name">
        <div class="validation-message">
            {{ $errors->first('link.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.link.fields.name_helper') }}
        </div>
    </div>
    {{-- <div class="form-group {{ $errors->has('link.url') ? 'invalid' : '' }}">
        <label class="form-label" for="url">{{ trans('cruds.link.fields.url') }}</label>
        <input class="form-control" type="text" name="url" id="url" wire:model.defer="link.url">
        <div class="validation-message">
            {{ $errors->first('link.url') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.link.fields.url_helper') }}
        </div>
    </div> --}}
    <div class="form-group {{ $errors->has('mediaCollections.link_file') ? 'invalid' : '' }}">
        <label class="form-label" for="file">{{ trans('cruds.link.fields.file') }}</label>
        <x-dropzone id="file" name="file" action="{{ route('admin.links.storeMedia') }}" collection-name="link_file" max-file-size="20" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.link_file') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.link.fields.file_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('link.link_category_id') ? 'invalid' : '' }}">
        <label class="form-label" for="link_category">{{ trans('cruds.link.fields.link_category') }}</label>
        <x-select-list class="form-control" id="link_category" name="link_category" :options="$this->listsForFields['link_category']" wire:model="link.link_category_id" />
        <div class="validation-message">
            {{ $errors->first('link.link_category_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.link.fields.link_category_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.links.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>