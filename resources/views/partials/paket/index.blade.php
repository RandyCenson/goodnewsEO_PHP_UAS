@extends('/layouts/main')

@push('css-dependencies')
<link rel="stylesheet" type="text/css" href="/css/paket.css" />
@endpush

@push('scripts-dependencies')
<script src="/js/paket.js" type="module"></script>
@endpush

@push('modals-dependencies')
@include('/partials/paket/paket_detail_modal')
@endpush

@section('content')
<!-- product -->
<section id="product" class="pb-5">
    <div class="container">

        @if(session()->has('message'))
        {!! session("message") !!}
        @endif

        <h5 class="section-title h1">Paket Yang Kami Sedia</h5>
        @can('add_paket',App\Models\Paket::class)
        <div class="d-flex align-items-end flex-column mb-4">
            <a style="text-decoration: none;" href="/paket/add_paket">
                <div class="text-right button-kemren mr-lg-5 mr-sm-3">pe</div>
            </a>
        </div>
        @else
        <div class="mb-5"></div>
        @endcan

        <div class="row justify-content-center">
            @foreach($paket as $row)
            <!-- paket card -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="{{ asset('storage/' . $row->image) }}"
                                          alt="{{ $row->image }}"></p>
                                    <h4 class="card-title">{{ $row->product_name }}</h4>
                                    <p class="card-text">{{ $row->description}}></p>
                                    <div class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">{{ $row->name }}</h4>
                                    <p class="card-text">{{ $row->orientation }}</p>

                                    <!-- detail -->
                                    {{-- <a href="/review/paket/{{ $row->id }}"><button
                                        class="btn btn-primary btn-sm ubah">Detail</button></a> --}}
                                    <!-- ulasan -->
                                    <a href="/review/paket/{{ $row->id }}"><button
                                          class="btn btn-primary btn-sm ubah">Review</button></a>

                                    <!-- [admin] ubah -->
                                    @can('edit_product',App\Models\Product::class)
                                    <a href="/paket/edit_product/{{ $row->id }}"><button
                                          class="btn btn-primary btn-sm ubah">Edit</button></a>
                                    @endcan
                                    {{-- @can('create_order',App\Models\Order::class)
                                    <a href="/order/make_order/{{ $row->id }}"><button
                                          class="btn btn-primary btn-sm ubah">Buy</button></a>
                                    @endcan --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./product card -->
            @endforeach
        </div>
    </div>
</section>
<!-- product -->

@endsection