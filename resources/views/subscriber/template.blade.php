@extends('layouts.app')

@section('libraries')
@yield('sublibraries')
@endsection

@section('styles')
    @yield('substyles')
@endsection

@section('content')
<div class = "ui container">
    @yield('subcontent')
   
    <!-- <div class="modal fade" tabindex="-1" role="dialog" id="changePassModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" id="changeForm">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="currPass">Current Password</label>
                            <input type="password" class="form-control" id="currPass" required>
                        </div>
                        <div class="form-group">
                            <label for="newPass">New Password</label>
                            <input type="password" class="form-control" id="newPass" required>
                        </div>
                        <div class="form-group">
                            <label for="confNewPass">Confirm New Password</label>
                            <input type="password" class="form-control" id="confNewPass" required>
                        </div>
                        <div class="alert alert-danger" id="changeerror" role="alert">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="changepwmodal" class="btn btn-primary">Change Password</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div> -->
</div>
@endsection

@section('scripts')
@yield('subscripts')
@endsection