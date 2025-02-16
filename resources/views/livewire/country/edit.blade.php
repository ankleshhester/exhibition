<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('country.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.country.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="country.name">
        <div class="validation-message">
            {{ $errors->first('country.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.country.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.country_image') ? 'invalid' : '' }}">
        <label class="form-label" for="image">{{ trans('cruds.country.fields.image') }}</label>
        <x-dropzone id="image" name="image" action="{{ route('admin.countries.storeMedia') }}" collection-name="country_image" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.country_image') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.country.fields.image_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.countries.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>