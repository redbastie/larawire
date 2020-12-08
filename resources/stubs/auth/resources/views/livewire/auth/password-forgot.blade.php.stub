@section('title', 'Reset Password')

<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">@yield('title')</div>
            <div class="card-body">
                @if($sent)
                    {{ $sent }}
                @else
                    <form wire:submit.prevent="sendResetLink">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" wire:model.defer="data.email">
                            @error('email')<span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>

                        <button type="submit" class="btn btn-block btn-primary">Send Password Reset Link</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
