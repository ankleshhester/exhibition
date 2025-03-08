<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('linkStatistic.link_id') ? 'invalid' : '' }}">
        <label class="form-label" for="link">{{ trans('cruds.linkStatistic.fields.link') }}</label>
        <x-select-list class="form-control" id="link" name="link" :options="$this->listsForFields['link']" wire:model="linkStatistic.link_id" />
        <div class="validation-message">
            {{ $errors->first('linkStatistic.link_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.linkStatistic.fields.link_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('linkStatistic.ip_address') ? 'invalid' : '' }}">
        <label class="form-label" for="ip_address">{{ trans('cruds.linkStatistic.fields.ip_address') }}</label>
        <input class="form-control" type="text" name="ip_address" id="ip_address" wire:model.defer="linkStatistic.ip_address">
        <div class="validation-message">
            {{ $errors->first('linkStatistic.ip_address') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.linkStatistic.fields.ip_address_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('linkStatistic.visitor_id') ? 'invalid' : '' }}">
        <label class="form-label" for="visitor">{{ trans('cruds.linkStatistic.fields.visitor') }}</label>
        <x-select-list class="form-control" id="visitor" name="visitor" :options="$this->listsForFields['visitor']" wire:model="linkStatistic.visitor_id" />
        <div class="validation-message">
            {{ $errors->first('linkStatistic.visitor_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.linkStatistic.fields.visitor_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('linkStatistic.action') ? 'invalid' : '' }}">
        <label class="form-label" for="action">{{ trans('cruds.linkStatistic.fields.action') }}</label>
        <input class="form-control" type="text" name="action" id="action" wire:model.defer="linkStatistic.action">
        <div class="validation-message">
            {{ $errors->first('linkStatistic.action') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.linkStatistic.fields.action_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.link-statistics.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>