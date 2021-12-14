<x-admin-master>

    @section('content')
        <div class="col-sm-9">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Product</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="users-table" width="100%" cellspacing="0">
                            <thead>
                            <tr>

                                <th>Id</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Delete</th>


                            </tr>
                            </thead>
                            <tfoot>
                            <tr>

                                <th>Id</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Delete</th>


                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($products as $product)
                                <tr>

                                    <td>{{$product->id}}</td>
                                    <td>{{$product->title}}</td>
                                    <td>

                                        <img height="70px" src="{{$product->photo}}" alt="">
                                    </td>
                                    <td>{{$product->category->name}}</td>
                                    <td>
                                        <form method="post" action="{{route('product.destroy',$product->id )}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



    @endsection
</x-admin-master>
