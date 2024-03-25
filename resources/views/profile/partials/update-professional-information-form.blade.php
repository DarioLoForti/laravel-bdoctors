<section>
    <header>
        <h2 class="text-secondary">
            {{ __('Professional Information') }}
        </h2>

        <p class="mt-1 text-muted">
            {{ __("Update, change or correct your professional information.") }}
        </p>
    </header>

{{--     <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form> --}}

    {{-- @php
        dd($user->doctor);   
    @endphp --}}

    <form action="{{ route('admin.doctors.update', $user->doctor->id) }}" enctype="multipart/form-data" method="POST" class="mt-6 space-y-6">
        @csrf
        @method('PUT')

        {{-- CITY UPDATE --}}

        <div class="mb-2">
            <label for="city">{{__('City')}}</label>
            <input class="form-control" type="text" name="city" id="city" value="{{old('city', $user->doctor->city)}}" required autofocus>
            @error('city')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->get('city')}}</strong>
            </span>
            @enderror
        </div>

        {{-- PHONE UPDATE --}}

        <div class="mb-2">
            <label for="phone">{{__('Phone Number')}}</label>
            <input class="form-control" type="text" name="phone" id="phone" value="{{old('phone', $user->doctor->phone)}}" required autofocus>
            @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->get('phone')}}</strong>
            </span>
            @enderror
        </div>

        {{-- CV UPDATE --}}

        @if ($user->doctor->cv != null)
        <div>
            <img src="{{ asset('storage/' . $user->doctor->cv) }}">
        </div>
        @endif

        <div class="form-group mb-3">
            <label for="cv">Curriculum Vitae</label>
            <input type="file" name="cv" id="cv" class="form-control">

            @error('cv')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- PROFILE PICTURE UPDATE --}}

        @if ($user->doctor->image != null)
            <div>
                <img src="{{ asset('storage/' . $user->doctor->image) }}">
            </div>
        @endif

        <div class="form-group mb-3">
            <label for="image">Photo</label>
            <input type="file" name="image" id="image" class="form-control">

            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- SPECIALIZATIONS UPDATE --}}

        <div class="form-group mb-3">
            <label for="" class="control-label  ">Specializations</label>
            <div>
                @php
                    $doctor_specializations = [];
                    
                    foreach ($user->doctor->specializations as $specialization) {
                        $doctor_specializations[] = $specialization->name;
                    }
                @endphp

                @foreach ($specializations as $specialization)
                    <div class="form-check-inline">
                        <input class="form-check-input" type="checkbox" name="specializations[]"
                            id="specialization-{{ $specialization->id }}"
                            value="{{ $specialization->id }}" @checked(is_array($doctor_specializations) && in_array($specialization->name, $doctor_specializations))>
                        <label for="specialization"
                            class="form-check-label ">{{ $specialization->name }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- SERVICES UPDATE --}}

        <div class="form-group mb-3">
            <label class="" for="services">Services:</label>
            <textarea class="form-control" name="services" id="services" cols="10" rows="10">{{old('services', $user->doctor->services)}}</textarea>
            @error('services')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex align-items-center gap-4">
            <button class="btn btn-primary" type="submit">{{ __('Save') }}</button>

            @if (session('status') === 'profile-updated')
            <script>
                const show = true;
                setTimeout(() => show = false, 2000)
                const el = document.getElementById('profile-status')
                if (show) {
                    el.style.display = 'block';
                }
            </script>
            <p id='profile-status' class="fs-5 text-muted">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
