@section('title', 'Register')

<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">@yield('title')</div>
            <div class="card-body">
                <form wire:submit.prevent="register">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model.defer="data.name">
                        @error('name')<span class="invalid-feedback">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" wire:model.defer="data.email">
                        @error('email')<span class="invalid-feedback">{{ $message }}</span>@enderror
                    </div>

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

                    <div class="form-group overflow-hidden">
                        <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}" data-callback="reCaptchaCallback" wire:ignore></div>
                        @error('recaptcha')<span class="invalid-feedback d-block">{{ $message }}</span>@enderror
                    </div>

                    <button type="submit" class="btn btn-block btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script>
        function reCaptchaCallback(response) {
            @this.set('data.recaptcha', response);
        }

        Livewire.on('resetReCaptcha', () => {
            grecaptcha.reset();
        });
    </script>
@endpush
