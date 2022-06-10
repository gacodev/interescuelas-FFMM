<div class="form-group row align-items-center" :class="{'has-danger': errors.has('sport_id'), 'has-success': fields.sport_id && fields.sport_id.valid }">
    <label for="sport_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.competence.columns.sport_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.sport_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('sport_id'), 'form-control-success': fields.sport_id && fields.sport_id.valid}" id="sport_id" name="sport_id" placeholder="{{ trans('admin.competence.columns.sport_id') }}">
        <div v-if="errors.has('sport_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('sport_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('categorie_id'), 'has-success': fields.categorie_id && fields.categorie_id.valid }">
    <label for="categorie_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.competence.columns.categorie_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.categorie_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('categorie_id'), 'form-control-success': fields.categorie_id && fields.categorie_id.valid}" id="categorie_id" name="categorie_id" placeholder="{{ trans('admin.competence.columns.categorie_id') }}">
        <div v-if="errors.has('categorie_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('categorie_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('quantity_of_participants'), 'has-success': fields.quantity_of_participants && fields.quantity_of_participants.valid }">
    <label for="quantity_of_participants" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.competence.columns.quantity_of_participants') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.quantity_of_participants" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('quantity_of_participants'), 'form-control-success': fields.quantity_of_participants && fields.quantity_of_participants.valid}" id="quantity_of_participants" name="quantity_of_participants" placeholder="{{ trans('admin.competence.columns.quantity_of_participants') }}">
        <div v-if="errors.has('quantity_of_participants')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('quantity_of_participants') }}</div>
    </div>
</div>


