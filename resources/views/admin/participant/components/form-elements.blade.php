<div class="form-group row align-items-center" :class="{'has-danger': errors.has('number_id'), 'has-success': fields.number_id && fields.number_id.valid }">
    <label for="number_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.participant.columns.number_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.number_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('number_id'), 'form-control-success': fields.number_id && fields.number_id.valid}" id="number_id" name="number_id" placeholder="{{ trans('admin.participant.columns.number_id') }}">
        <div v-if="errors.has('number_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('number_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.participant.columns.name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}" id="name" name="name" placeholder="{{ trans('admin.participant.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('email'), 'has-success': fields.email && fields.email.valid }">
    <label for="email" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.participant.columns.email') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.email" v-validate="'required|email'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('email'), 'form-control-success': fields.email && fields.email.valid}" id="email" name="email" placeholder="{{ trans('admin.participant.columns.email') }}">
        <div v-if="errors.has('email')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('email') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('phone'), 'has-success': fields.phone && fields.phone.valid }">
    <label for="phone" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.participant.columns.phone') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.phone" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('phone'), 'form-control-success': fields.phone && fields.phone.valid}" id="phone" name="phone" placeholder="{{ trans('admin.participant.columns.phone') }}">
        <div v-if="errors.has('phone')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('phone') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('birthday'), 'has-success': fields.birthday && fields.birthday.valid }">
    <label for="birthday" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.participant.columns.birthday') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.birthday" :config="datePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('birthday'), 'form-control-success': fields.birthday && fields.birthday.valid}" id="birthday" name="birthday" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('birthday')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('birthday') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('doc_id'), 'has-success': fields.doc_id && fields.doc_id.valid }">
    <label for="doc_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.participant.columns.doc_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.doc_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('doc_id'), 'form-control-success': fields.doc_id && fields.doc_id.valid}" id="doc_id" name="doc_id" placeholder="{{ trans('admin.participant.columns.doc_id') }}">
        <div v-if="errors.has('doc_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('doc_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('force_id'), 'has-success': fields.force_id && fields.force_id.valid }">
    <label for="force_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.participant.columns.force_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.force_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('force_id'), 'form-control-success': fields.force_id && fields.force_id.valid}" id="force_id" name="force_id" placeholder="{{ trans('admin.participant.columns.force_id') }}">
        <div v-if="errors.has('force_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('force_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nationality_id'), 'has-success': fields.nationality_id && fields.nationality_id.valid }">
    <label for="nationality_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.participant.columns.nationality_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nationality_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nationality_id'), 'form-control-success': fields.nationality_id && fields.nationality_id.valid}" id="nationality_id" name="nationality_id" placeholder="{{ trans('admin.participant.columns.nationality_id') }}">
        <div v-if="errors.has('nationality_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nationality_id') }}</div>
    </div>
</div>


