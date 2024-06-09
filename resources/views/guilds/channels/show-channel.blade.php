@extends('layouts.app')

@section('content')
    <main>
        <input type="hidden" id="channelId" value="{{ $channel->getKey() }}">
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">{{ $channel->name }}</h1>
                    <p class="lead text-body-secondary">
                        Yeah omg you can find any guild you want here OMGGG!!! oWo
                    </p>
                    <p>
                        <a href="#" class="btn btn-primary my-2">Send me to a random guild</a>
                    </p>
                </div>
            </div>
        </section>

        <div class="container">
            <div class="row vh-70">
                <div class="col-md-9 d-flex flex-column">
                    <div class="flex-grow-1 overflow-auto  p-3" id="chatMessages">
                        <p>
                            <span>{{ date('H:i:s') }}</span>
                            <span>admin:</span>
                            <span>you joined as {{ auth()->user()->name }}</span>
                        </p>

                    </div>
                    <div class="bg-white p-3 border-top">
                        <x-chat-form/>
                    </div>
                </div>
                <div class="col-md-3 border-start">
                    <div class="list-group list-group-flush" id="presenceList">


                        <!-- Add more users here -->
                    </div>
                </div>
            </div>
        </div>


    </main>

@endsection
