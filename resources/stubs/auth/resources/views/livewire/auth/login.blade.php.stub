@section('title', 'Login')

<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">@yield('title')</div>
            <div class="card-body">
                <form wire:submit.prevent="login">
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

                    <div class="form-group row">
                        <div class="col">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" id="remember" class="custom-control-input @error('remember') is-invalid @enderror" wire:model.defer="data.remember">
                                <label for="remember" class="custom-control-label">Remember</label>
                                @error('remember')<span class="invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-auto">
                            @if(Route::has('password.forgot'))
                                <a href="{{ route('password.forgot') }}">Forgot Password?</a>
                            @endif
                        </div>
                    </div>

                    <button type="submit" class="btn btn-block btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
