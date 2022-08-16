@extends('layouts.backend')
@section('content')
<div class="container-fluid">
    
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active"><a >Setting</a></li>
                    </ol>
                </div>
                <h4 class="page-title">Setting</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
<div class="row">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-body">        
                <h4 class="mt-0 header-title">Setting</h4>
                @include('dashboard.parts.alert.success')
                @include('dashboard.parts.alert.error')
                <form action="{{ route('env_key_update.update') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="MAIL_MAILER">
                        <div class="col-md-3">
                            <label class="col-from-label">{{('Type')}}</label>
                        </div>                        <div class="col-md-9">
                            <select class="form-control aiz-selectpicker mb-2 mb-md-0" name="MAIL_MAILER" onchange="checkMailDriver()">
                                <option value="smtp" @if (env('MAIL_MAILER') == "smtp") selected @endif>{{ ('SMTP') }}</option>
                                <option value="sendmail" @if (env('MAIL_MAILER') == "sendmail") selected @endif>{{ ('sendmail') }}</option>


                                
                            </select>
                        </div>
                    </div>
                    <div id="smtp">
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="MAIL_HOST">
                            <div class="col-md-3">
                                <label class="col-from-label">{{('MAIL HOST')}}</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="MAIL_HOST" value="{{  env('MAIL_HOST') }}" placeholder="{{ ('MAIL HOST') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="MAIL_PORT">
                            <div class="col-md-3">
                                <label class="col-from-label">{{('MAIL PORT')}}</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="MAIL_PORT" value="{{  env('MAIL_PORT') }}" placeholder="{{ ('MAIL PORT') }}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="MAIL_USERNAME">
                            <div class="col-md-3">
                                <label class="col-from-label">{{('MAIL USERNAME')}}</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="MAIL_USERNAME" value="{{  env('MAIL_USERNAME') }}" placeholder="{{ ('MAIL USERNAME') }}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="MAIL_PASSWORD">
                            <div class="col-md-3">
                                <label class="col-from-label">{{('MAIL PASSWORD')}}</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="MAIL_PASSWORD" value="{{  env('MAIL_PASSWORD') }}" placeholder="{{ ('MAIL PASSWORD') }}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="MAIL_ENCRYPTION">
                            <div class="col-md-3">
                                <label class="col-from-label">{{('MAIL ENCRYPTION')}}</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="MAIL_ENCRYPTION" value="{{  env('MAIL_ENCRYPTION') }}" placeholder="{{ ('MAIL ENCRYPTION') }}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="MAIL_FROM_ADDRESS">
                            <div class="col-md-3">
                                <label class="col-from-label">{{('MAIL FROM ADDRESS')}}</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="MAIL_FROM_ADDRESS" value="{{  env('MAIL_FROM_ADDRESS') }}" placeholder="{{ ('MAIL FROM ADDRESS') }}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="MAIL_FROM_NAME">
                            <div class="col-md-3">
                                <label class="col-from-label">{{('MAIL FROM NAME')}}</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="MAIL_FROM_NAME" value="{{  env('MAIL_FROM_NAME') }}" placeholder="{{ ('MAIL FROM NAME') }}" >
                            </div>
                        </div>
                    </div>
                    <div id="mailgun">
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="MAILGUN_DOMAIN">
                            <div class="col-md-3">
                                <label class="col-from-label">{{('MAILGUN DOMAIN')}}</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="MAILGUN_DOMAIN" value="{{  env('MAILGUN_DOMAIN') }}" placeholder="{{ ('MAILGUN DOMAIN') }}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="MAILGUN_SECRET">
                            <div class="col-md-3">
                                <label class="col-from-label">{{('MAILGUN SECRET')}}</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="MAILGUN_SECRET" value="{{  env('MAILGUN_SECRET') }}" placeholder="{{ ('MAILGUN SECRET') }}" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-primary">حفظ الإعدادات</button>
                    </div>
                </form>
                                                                                      
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
</div>


@endsection