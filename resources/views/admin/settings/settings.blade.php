@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
            Edit Blog Settings
        <div class="card-body">
            <form action="{{ route('settings.update') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="site_name">Site Name</label>
                    <input type="text" name="site_name" class="form-control" value="{{ $settings->site_name }}">
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control" value="{{ $settings->address }}">
                </div>

                <div class="form-group">
                    <label for="contact_number">Contact Phone</label>
                    <input type="text" name="contact_number" class="form-control" value="{{ $settings->contact_number }}">
                </div>

                <div class="form-group">
                    <label for="contact_email">Contact Email</label>
                    <input type="email" name="contact_email" class="form-control" value="{{ $settings->contact_email }}">
                </div>


                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">
                            Update site settings
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@stop