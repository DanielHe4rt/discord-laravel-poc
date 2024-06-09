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
                    @foreach($guilds as $guild)

                        <div class="col-3">
                            <div class="card shadow-sm">
                                <img src="{{ $guild->icon_url }}" alt="" class="bd-placeholder-img card-img-top"
                                     width="100%" height="225">
                                <div class="card-body">
                                    <p class="card-text">
                                        {{ $guild->name }}
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="{{ route('guilds.show', $guild) }}" type="button" class="btn btn-sm btn-outline-secondary">View</a>
                                        </div>
                                        <small class="text-body-secondary">by {{ $guild->owner->name }}</small>
                                        <small class="text-body-secondary">{{ $guild->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                {{ $guilds->links() }}
            </div>
        </div>

    </main>

@endsection
