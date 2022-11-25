@extends('layouts.main')

@section('content')
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Vytvoření cvičení') }}
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('create-exercise.store') }}">
                            @csrf

                            <div class="row row-center">
                                <div>
                                    <div class="mb-3 row row-center">
                                        <label for="" class="col-form-label text-start">
                                            {{ __('Viditelnost') }} :
                                        </label>

                                        <div class="col-md-6">
                                            <div>
                                                <div>
                                                    <input type="radio"
                                                           class="form-check-input"
                                                           name="visibility" id="private" value="private"
                                                        {{ old('visibility') == 'public' ? '' : 'checked' }}>
                                                    <label for="private" class="form-check-label">
                                                        Soukromé cvičení
                                                    </label>
                                                </div>
                                                <div>
                                                    <input type="radio"
                                                           class="form-check-input"
                                                           name="visibility" id="public" value="public"
                                                        {{ old('visibility') == 'public' ? 'checked' : '' }}>
                                                    <label for="private" class="form-check-label">
                                                        Veřejné cvičení
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row row-center">
                                <label for="name" class="col-form-label text-start">
                                    {{ __('Název *') }} :
                                </label>

                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control"
                                           name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                           oninvalid="this.setCustomValidity('Prosím zadejte název cvičení')"
                                           oninput="setCustomValidity('')">
                                </div>
                            </div>

                            <div class="mb-3 row row-center">
                                <label for="description" class="col-form-label text-start">
                                    {{ __('Popis') }} :
                                </label>

                                <div class="col-md-12">
                                    <textarea rows="5" cols="60" id="description" name="description" class="form-control" style="height:20vh;"
                                              required autocomplete="description" autofocus></textarea>
                                </div>
                            </div>

                            <div class="my-3 d-flex">
                                <!--
                                 TODO
                                  - zrušit will navigate to home-page or previous page
                                  - vytvořit skupinu will navigate to moje cviceni page
                                 -->
                                <a href="{{ route('home') }}">
                                    <button class="btn btn-outline-secondary btn-lg px-4 gap-3">Zrušit</button>
                                </a>
                                <button type="submit" class="btn btn-primary btn-lg px-3 ms-auto me-0">Vytvořit cvičení</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
