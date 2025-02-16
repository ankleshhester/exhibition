<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('linkCategory.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.linkCategory.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="linkCategory.name">
        <div class="validation-message">
            {{ $errors->first('linkCategory.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.linkCategory.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.link_category_image') ? 'invalid' : '' }}">
        <label class="form-label" for="image">{{ trans('cruds.linkCategory.fields.image') }}</label>
        <x-dropzone id="image" name="image" action="{{ route('admin.link-categories.storeMedia') }}" collection-name="link_category_image" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.link_category_image') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.linkCategory.fields.image_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.link-categories.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>