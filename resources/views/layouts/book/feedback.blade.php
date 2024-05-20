<x-app-layout>
    <div class="py-4">
        <div class="mx-auto sm:px-6 lg:px-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 card">




                                <div class="card-header text-xl">{{ __('Submit Feedback') }}</div>

                                <div class="card-body">
                                    <form method="POST" action="{{ route('feedback.store') }}">
                                        @csrf

                                        <div class="form-group">
                                            <label for="content" class="text-lg mb-2">{{ __('Feedback') }}</label>
                                            <textarea id="content" class="form-control @error('content') is-invalid @enderror" name="content" rows="4" required>{{ old('content') }}</textarea>

                                            @error('content')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-primary mt-3">{{ __('Submit') }}</button>
                                    </form>
                                </div>
                            </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
