<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="delete-account" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
    aria-labelledby="delete-account" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete-account">Elimina Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Sei sicuro di volere eliminare il tuo account?') }}
                </h2>
                <p class="mt-1 text-sm text-gray-600">
                    {{ __('Per favore inserisci la tua password per confermare l\'eliminazione del tuo account') }}
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>

                <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                    @csrf
                    @method('delete')


                    <div class="input-group">

                        <input id="password" name="password" type="password" class="form-control"
                            placeholder="{{ __('Password') }}" />

                        @error('password')
                            <span class="invalid-feedback mt-2" role="alert">
                                <strong>{{ $errors->userDeletion->get('password') }}</strong>
                            </span>
                        @enderror



                        <button type="submit" class="btn btn-danger">
                            {{ __('Elimina Account') }}
                        </button>
                        <!--  -->
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
