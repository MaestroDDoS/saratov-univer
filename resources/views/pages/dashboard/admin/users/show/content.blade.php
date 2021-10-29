@extends('pages.dashboard.main-frame')
@section( 'content' )
<x-dashboard.modal-window name="user" :id="$user->id"/>
<div class="personal-info-panel">
    <div class="dashboard-table-title">
        <h4>Личная информация</h4>
        <div class="dashboard-table-buttons-field">
            <button type="button" data-toggle="modal" data-target="#modal-accept">
                <i class="fl-bigmug-line-cross83"></i><span>Удалить</span>
            </button>
        </div>
    </div>
    <form action="{{ route( "dashboard.admin.users.update", $user->id ) }}" class="personal-info-form">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="input-name">Имя</label>
                <input type="text" class="form-control shadow-sm" name="name" value="{{ $user->name }}" validate="name">
            </div>
            <div class="form-group col-md-6">
                <label for="input-surname">Фамилия</label>
                <input type="text" class="form-control shadow-sm" name="surname" value="{{ $user->surname }}" validate="surname">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="input-email">Электронная почта</label>
                <input type="email" class="form-control shadow-sm" name="email" value="{{ $user->email }}" validate="email">
            </div>
            <div class="form-group col-md-6">
                <label for="input-phone">Мобильный телефон</label>
                <input type="text" class="form-control shadow-sm" name="phone" value="{{ $user->phone }}" validate="phone">
            </div>
        </div>
        <div>
            <div class="d-flex flex-column mt-3">
                <label class="checkbox-inline">
                    <input
                        name="is_admin"
                        {{ !$user->is_admin ?: "checked" }}
                        type="checkbox"
                        accordion-href="#panel-admin-settings"
                    >Администратор
                </label>
            </div>
            <div class="" id="panel-admin-settings">
                <div class="mb-3">
                    <div class="user-premission text-main-dark mt-3 mb-2">
                        <div class="col-5 col-md-3">Раздел</div>
                        <div class="col-3 col-md-2">Просмотр</div>
                        <div class="col">Изменение</div>
                    </div>
                    @php( $permissions = \App\Enums\UserPermissions::getKeys() )
                    @foreach( $permissions as $idx => $key )
                        @if( ( $idx % 2 ) )
                            <div class="user-premission">
                                <div class="col-5 col-md-3">{{ __( "permissions.".strtolower( str_replace( "Write", "", $key ) ) ) }}</div>
                                <div class="col-3 col-md-2">
                                    <label class="checkbox-inline"> 
                                        <input
                                            name="{{ $permissions[ $idx-1 ] }}"
                                            {{ !$user->hasPermissions( \App\Enums\UserPermissions::getValue( $permissions[ $idx-1 ] ) ) ?: "checked" }}
                                            type="checkbox"
                                            class="checkbox-custom"
                                        >
                                    </label>
                                </div>
                                <div class="col">
                                    <label class="checkbox-inline"> 
                                        <input
                                            name="{{ $key }}"
                                            {{ !$user->hasPermissions( \App\Enums\UserPermissions::getValue( $key ) ) ?: "checked" }}
                                            type="checkbox"
                                            class="checkbox-custom"
                                        >
                                    </label>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div>
                <div class="my-3">
                    <div class="form-group col-md-6 p-0">
                        <label for="input-inn">ИНН</label>
                        <input type="text" class="form-control shadow-sm" name="input-inn" value="{{ $user->inn }}" validate="user-inn">
                        <small>желательно</small>
                    </div>
                    <div class="form-group col-md-6 mb-4 p-0">
                        <label class="checkbox-inline mt-2">
                            <input
                                name="send_notifies"
                                value="1"
                                {{ !$user->send_notifies ?: "checked" }}
                                type="checkbox"
                            >
                            Получать уведомления на почту
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-2">
            <a href="#submenu-password-change" class="mr-auto pr-2" data-toggle="collapse">
                <i class="fl-bigmug-line-note35 mr-2"></i>Сменить пароль
            </a>
        </div>
        <div class="collapse change-password" id="submenu-password-change">
            <div class="form-group col-md-6">
                <label for="input-change-password">{{ __( 'dashboard.new-password' ) }}</label>
                <div class="input-group">
                    <div class="input-group-prepend shadow-sm">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input class="form-control shadow-sm" id="input-change-password" name="password" type="password" autocomplete="new-password" validate="password" password-confirm="input-change-password2">
                </div>
            </div>
            <div class="form-group col-md-6 mb-0">
                <label for="input-change-password2">{{ __( 'dashboard.new-password-confirm' ) }}</label>
                <div class="input-group">
                    <div class="input-group-prepend shadow-sm">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input class="form-control shadow-sm" id="input-change-password2" name="password-confirm" type="password" autocomplete="new-password" validate="confirm-password" password-input="input-change-password">
                </div>
            </div>
        </div>
        <div class="d-flex mt-4 mb-3">
            <button type="submit" class="btn btn-primary ml-auto">
                <i class="fl-bigmug-line-save15"></i>
                <span>Сохранить</span>
            </button>
        </div>
    </form>
</div>
@endsection
@section('js')
    <script src="{{ asset( 'js/dashboard/modal-window.js' ) }}"></script>
    <script src="{{ asset( 'js/dashboard/admin/user-profile.js' ) }}"></script>
@endsection
