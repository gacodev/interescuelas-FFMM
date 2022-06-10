<div class="form-group row align-items-center" :class="{'has-danger': errors.has('sport'), 'has-success': fields.sport && fields.sport.valid }">
    <label for="sport" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sport.columns.sport') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.sport" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('sport'), 'form-control-success': fields.sport && fields.sport.valid}" id="sport" name="sport" placeholder="{{ trans('admin.sport.columns.sport') }}">
        <div v-if="errors.has('sport')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('sport') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('description'), 'has-success': fields.description && fields.description.valid }">
    <label for="description" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sport.columns.description') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.description" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('description'), 'form-control-success': fields.description && fields.description.valid}" id="description" name="description" placeholder="{{ trans('admin.sport.columns.description') }}">
        <div v-if="errors.has('description')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('description') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('image'), 'has-success': fields.image && fields.image.valid }">
    <label for="image" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sport.columns.image') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.image" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('image'), 'form-control-success': fields.image && fields.image.valid}" id="image" name="image" placeholder="{{ trans('admin.sport.columns.image') }}">
        <div v-if="errors.has('image')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('image') }}</div>
    </div>
</div>


