<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nationality'), 'has-success': fields.nationality && fields.nationality.valid }">
    <label for="nationality" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.nationality.columns.nationality') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nationality" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nationality'), 'form-control-success': fields.nationality && fields.nationality.valid}" id="nationality" name="nationality" placeholder="{{ trans('admin.nationality.columns.nationality') }}">
        <div v-if="errors.has('nationality')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nationality') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('flag_image'), 'has-success': fields.flag_image && fields.flag_image.valid }">
    <label for="flag_image" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.nationality.columns.flag_image') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.flag_image" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('flag_image'), 'form-control-success': fields.flag_image && fields.flag_image.valid}" id="flag_image" name="flag_image" placeholder="{{ trans('admin.nationality.columns.flag_image') }}">
        <div v-if="errors.has('flag_image')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('flag_image') }}</div>
    </div>
</div>


