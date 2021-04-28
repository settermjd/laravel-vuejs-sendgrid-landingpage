@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="p-6">
                <div class="flex items-center" id="header">
                    <h1 class="h1">Thank you for subscribing!</h1>
                </div>
                <div class="body-text" id="body">
                    Thanks for subscribing. You're now on the list to be one of the first to find out when the thing
                    we're making is available.
                </div>
                <footer class="mt-6">
                    <div class="mb-4">
                        <h3 class="font-bold underline">The Little PHP Shop.</h3>
                        <span class="italic">Here to look after all your PHP needs.</span><br>
                    </div>
                    <div class="flex">
                        <div class="flex-col flex-initial">
                            <img src="/img/php/elephpant-small.png"
                                 align="left"
                                 alt="Small PHP ElePHPant">
                        </div>
                        <address class="flex-col">
                            (e): <a href="mailto:info@thelittlephpshop.com">info@thelittlephpshop.com</a><br>
                            (t): <a href="tel:+17123456789">+17123456789</a><br>
                            (a): 123 Kerrigan St, Frenchville, Qld 4701, Australia
                        </address>
                    </div>
                </footer>
            </div>
        </div>
    </div>
@endsection
