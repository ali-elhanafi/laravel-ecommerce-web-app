<x-home-master>
    @section('content')
        <div class="col-sm-9">
            <div class="card shadow mb-4">
                @if( ! Session::has('cart'))
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">No items added</h6>
                    </div>
                @else
                    <div class="row">
                        <div class="col card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><strong>Cart</strong></h6>
                        </div>

                        <div class="col card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">TotalPrice: $<strong> {{$totalPrice}}</strong>
                            </h6>

                        </div>
                        <div class="col card-header py-3">
                            <a href="{{route('cart.checkout')}}" type="button" class="btn btn-success">CheckOut</a>
                            </h6>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="users-table" width="100%" cellspacing="0">
                                <thead>
                                <tr>

                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Delete</th>


                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Delete</th>

                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>

                                        <td>

                                            <img height="70px" src="{{$product['item']['photo']}}" alt="">
                                        </td>
                                        <td>{{$product['item']['title']}}</td>
                                        <td>{{$product['Qty']}}</td>
                                        <td>{{$product['price']}}</td>

                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Action <span class="cart"></span></button>

                                            <ul class="dropdown-menu">
                                                <li><a href="">Reduce By 1</a></li>
                                                <li><a href="">Reduce All</a></li>
                                            </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                @endif

            </div>
        </div>



    @endsection
</x-home-master>
