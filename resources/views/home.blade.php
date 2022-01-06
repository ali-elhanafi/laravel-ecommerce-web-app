<x-home-master>

    @section('content')
        <section class="product_section layout_padding">
            <div class="container">
                <div class="heading_container heading_center">
                    <div class="row">
                        @if(session()->has('success'))
                            <div id="charge-message" class="alert alert-success">{{session('success')}}</div>
                        @endif
                    </div>
                    <div class="row">
                        @foreach($categories as $category)
                            <div class="col">
                            <form action="{{route('product.show',$category->id)}}">
                                @csrf
                                <button class="btn btn-dark">{{$category->name}}</button>
                            </form>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="heading_container heading_center">

                    <h2>
                        Our <span>products</span>
                    </h2>
                </div>
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="box">
                                <div class="option_container">
                                    <div class="options">
                                        <a href="{{route('product.add.cart',$product->id)}}" class="option1">
                                            Add To Cart
                                        </a>
                                        <a href="" class="option2">
                                            Buy Now
                                        </a>
                                    </div>
                                </div>
                                <div class="img-box">
                                    <img src="{{$product->photo}}" alt="">
                                </div>
                                <div class="detail-box">
                                    <div class="container">
                                        <div class="row row-cols-1">
                                            <div class="col">
                                                <h5>
                                                    {{$product->category->name}}'s
                                                </h5>
                                            </div>
                                            <div class="row row-cols-2">
                                                <div class="col">

                                                    <h5>
                                                        {{$product->title}}
                                                    </h5>

                                                </div>
                                                <div class="col">
                                                    <h6>
                                                        ${{$product->price}}
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="btn-box">
                    <a href="">
                        View All products
                    </a>
                </div>
            </div>
        </section>

    @endsection

</x-home-master>
