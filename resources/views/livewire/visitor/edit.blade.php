<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('visitor.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.visitor.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="visitor.name">
        <div class="validation-message">
            {{ $errors->first('visitor.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.visitor.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('visitor.email') ? 'invalid' : '' }}">
        <label class="form-label required" for="email">{{ trans('cruds.visitor.fields.email') }}</label>
        <input class="form-control" type="email" name="email" id="email" required wire:model.defer="visitor.email">
        <div class="validation-message">
            {{ $errors->first('visitor.email') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.visitor.fields.email_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('visitor.mobile') ? 'invalid' : '' }}">
        <label class="form-label" for="mobile">{{ trans('cruds.visitor.fields.mobile') }}</label>
        <input class="form-control" type="text" name="mobile" id="mobile" wire:model.defer="visitor.mobile">
        <div class="validation-message">
            {{ $errors->first('visitor.mobile') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.visitor.fields.mobile_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('visitor.country_id') ? 'invalid' : '' }}">
        <label class="form-label" for="country">{{ trans('cruds.visitor.fields.country') }}</label>
        <x-select-list class="form-control" id="country" name="country" :options="$this->listsForFields['country']" wire:model="visitor.country_id" />
        <div class="validation-message">
            {{ $errors->first('visitor.country_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.visitor.fields.country_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.visitors.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>