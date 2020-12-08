@section('title', 'Reset Password')

<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">@yield('title')</div>
            <div class="card-body">
                <form wire:submit.prevent="resetPassword">
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" wire:model.defer="data.password">
                        @error('password')<span class="invalid-feedback">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" wire:model.defer="data.password_confirmation">
                        @error('password_confirmation')<span class="invalid-feedback">{{ $message }}</span>@enderror
                    </div>

                    <button type="submit" class="btn btn-block btn-primary">Reset Password</button>
                </form>
            </div>
        </div>
    </div>
</div>
