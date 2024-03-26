<section>
    <header>
        <h2 class="text-secondary">
            {{ __('Informazioni Personali') }}
        </h2>

        <p class="mt-1 text-muted">
            {{ __('Modifica le tue informazioni personali.') }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        {{-- NAME UPDATE --}}

        <div class="mb-2">
            <label for="name">{{ __('Nome') }}</label>
            <input class="form-control" type="text" name="name" id="name" autocomplete="name"
                value="{{ old('name', $user->name) }}" required maxlength="50" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->get('name') }}</strong>
                </span>
            @enderror
        </div>

        {{-- SURNAME UPDATE --}}

        <div class="mb-2">
            <label for="surname">{{ __('Cognome') }}</label>
            <input class="form-control" type="text" name="surname" id="surname" autocomplete="surname"
                value="{{ old('surname', $user->surname) }}" required maxlength="50" autofocus>
            @error('surname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->get('surname') }}</strong>
                </span>
            @enderror
        </div>

        {{-- ADRESS UPDATE --}}

        <div class="mb-2">
            <label for="address">{{ __('Indirizzo') }}</label>
            <input class="form-control" type="text" name="address" id="address" autocomplete="address"
                value="{{ old('address', $user->address) }}" required maxlength="150" autofocus>
            @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->get('address') }}</strong>
                </span>
            @enderror
        </div>

        {{-- EMAIL UPDATE/VERIFICATION --}}

        <div class="mb-2">
            <label for="email">
                {{ __('Email') }}
            </label>

            <input id="email" name="email" type="email" class="form-control"
                value="{{ old('email', $user->email) }}" required maxlength="255" autocomplete="username" />

            @error('email')
                <span class="alert alert-danger mt-2" role="alert">
                    <strong>{{ $errors->get('email') }}</strong>
                </span>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-muted">
                        {{ __('La tua email non è verificata.') }}

                        <button form="send-verification" class="btn btn-outline-dark">
                            {{ __('Clicca qui per reinviare la richiesta di validazione') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-success">
                            {{ __('Un nuovo link di verifica è stato inviato alla tua email') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="d-flex align-items-center gap-4">
            <button class="btn btn-primary" type="submit">{{ __('Salva') }}</button>
        </div>
    </form>
</section>
