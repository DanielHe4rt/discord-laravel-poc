@extends('layouts.app')

@section('content')
    <main>

        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Discover guilds</h1>
                    <p class="lead text-body-secondary">
                        Yeah omg you can find any guild you want here OMGGG!!! oWo
                    </p>
                    <p>
                        <a href="#" class="btn btn-primary my-2">Send me to a random guild</a>
                    </p>
                </div>
            </div>
        </section>

        <div class="album py-5 bg-body-tertiary">
            <div class="container">
                <div class="row ">
                    @foreach($channels as $channel)

                        <div class="col-3">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <p class="card-text">
                                        {{ $channel->name }}
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="{{ route('guilds.channels.show', ['guild' => $guild, 'channel', $channel]) }}" type="button" class="btn btn-sm btn-outline-primary">Join</a>
                                        </div>
                                        <small class="text-body-secondary">Online: 123</small>
                                        <small class="text-body-secondary">{{ $guild->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                {{ $channels->links() }}
            </div>
        </div>

    </main>

@endsection
