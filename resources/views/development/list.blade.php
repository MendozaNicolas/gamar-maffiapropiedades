@extends('layout.app')
@section('content')
<section class="flat-section-v6 flat-recommended flat-sidebar">
    <div class="container">
        <div class="box-title-listing">
            <h5>Emprendimientos</h5>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12" id="gridLayout">
                <div class="row">
                    @forelse($developments as $development)
                        <div class="col-md-4">
                            <div class="homeya-box">
                                <div class="archive-top">
                                    <a href="emprendimiento/{{ $development['id'] . '_emprendimiento-' . Str::slug($development['name']) }}"
                                        class="images-group">
                                        <div class="images-style">
                                            <img src="{{ $development['photos']['0']['image'] }}" alt="img">
                                        </div>
                                        <div class="top">
                                            <ul class="d-flex gap-8">
                                                <!-- <li class="flag-tag success">Comercializando</li> -->
                                                <li class="flag-tag style-1">{{ $development['construction_status'] }}</li>
                                            </ul>
                                        </div>
                                    </a>
                                    <div class="content">
                                        <div class="h7 text-capitalize fw-7"><a
                                                href="emprendimiento/{{ $development['id'] . '_emprendimiento-' . Str::slug($development['name']) }}"
                                                class="link">{{$development['name']}}</a></div>
                                        <div class="desc">
                                            <i class="fs-16 icon icon-mapPin"></i>
                                            <p>{{$development['address']}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h3 style="margin: 10rem 0">No se encontraron emprendimientos en este momento</h3>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
@endsection