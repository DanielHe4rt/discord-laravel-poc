@extends('layouts.app')

@section('content')
    <main>
        <input type="hidden" name="channelId" value="{{ $channel->getKey() }}">
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
                        @foreach(range(1,5) as $fodase)
                            <p>
                                <span>[00:00:00]</span>
                                <span>danielhe4rt:</span>
                                <span> vai caraio</span>
                            </p>
                        @endforeach

                    </div>
                    <div class="bg-white p-3 border-top">
                        <form id="chatForm">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Type a message..." aria-label="Message" aria-describedby="button-send">
                                <button class="btn btn-primary" type="submit" id="button-send">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-3 border-start">
                    <div class="list-group list-group-flush">
                        @foreach(range(1,5) as $fodase )
                            <p href="#" class="list-group-item list-group-item-action m-0">
                                <img src="https://github.com/danielhe4rt.png" width="50" class="rounded mx-2" alt="">
                                danielhe4rt
                            </p>
                        @endforeach

                        <!-- Add more users here -->
                    </div>
                </div>
            </div>
        </div>


    </main>

@endsection
