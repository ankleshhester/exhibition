<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('exhibition.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.exhibition.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="exhibition.name">
        <div class="validation-message">
            {{ $errors->first('exhibition.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.exhibition.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('exhibition.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.exhibition.fields.description') }}</label>
        <input class="form-control" type="text" name="description" id="description" wire:model.defer="exhibition.description">
        <div class="validation-message">
            {{ $errors->first('exhibition.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.exhibition.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('exhibition.active') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="active" id="active" wire:model.defer="exhibition.active">
        <label class="form-label inline ml-1" for="active">{{ trans('cruds.exhibition.fields.active') }}</label>
        <div class="validation-message">
            {{ $errors->first('exhibition.active') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.exhibition.fields.active_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.exhibitions.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>