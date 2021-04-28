@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="mt-8 bg-white overflow-hidden shadow sm:rounded-lg">
            <div class="pl-4 pr-4 pt-6 pb-6" id="app">
                <div v-show="! submitted">
                    <div class="flex items-center" id="header">
                        <h1 class="h1">Sign-up to stay in the know!</h1>
                    </div>
                    <div class="body-text" id="body">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Sed eget ante at lorem scelerisque placerat.
                        Duis eleifend tortor vitae massa lacinia, ut elementum nulla blandit.
                    </div>
                    <div class="form-wrapper" id="signup-form">
                        <div v-if="errors.length > 0" class="form-errors">
                            <span>Please correct the following error(s):</span>
                            <error-item v-for="item in errors" v-bind:error="item"
                            ></error-item>
                        </div>
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <form action="/signup"
                              enctype="application/x-www-form-urlencoded"
                              method="post"
                              name="signup-form"
                              @submit.prevent="processForm">
                            @csrf
                            <input class="form-email"
                                   name="email"
                                   placeholder="Please enter your email address"
                                   type="email"
                                   v-model="form.email"
                            >
                            <button class="button-orange" type="submit">Sign up</button>
                        </form>
                    </div>
                </div>
                <div v-show="submitted">
                    <div class="flex items-center" id="header">
                        <h1 class="h1">Thanks for signing up!</h1>
                    </div>
                    <div class="body-text" id="body">Check your inbox shortly for an email from us.</div>
                    <div class="ml-4 mr-4 mt-2 text-sm">
                        <a href="/" class="link">Start over</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/vue@3.0.2"></script>
    <script src="/js/app.js"></script>
@endsection
