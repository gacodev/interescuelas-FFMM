<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/sports') }}"><i class="nav-icon icon-umbrella"></i> {{ trans('admin.sport.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/awards') }}"><i class="nav-icon icon-magnet"></i> {{ trans('admin.award.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/docs') }}"><i class="nav-icon icon-puzzle"></i> {{ trans('admin.doc.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/competences') }}"><i class="nav-icon icon-book-open"></i> {{ trans('admin.competence.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/scores') }}"><i class="nav-icon icon-globe"></i> {{ trans('admin.score.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/participants') }}"><i class="nav-icon icon-book-open"></i> {{ trans('admin.participant.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/nationalities') }}"><i class="nav-icon icon-star"></i> {{ trans('admin.nationality.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/categories') }}"><i class="nav-icon icon-globe"></i> {{ trans('admin.category.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/forces') }}"><i class="nav-icon icon-drop"></i> {{ trans('admin.force.title') }}</a></li>
           {{-- Do not delete me :) I'm used for auto-generation menu items --}}

            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i class="nav-icon icon-user"></i> {{ __('Manage access') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i class="nav-icon icon-location-pin"></i> {{ __('Translations') }}</a></li>
            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
