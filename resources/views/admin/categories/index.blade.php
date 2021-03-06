<x-admin-master>
    @section('content')
        <h1>Categories</h1>
        <div class="row">
            @if(session()->has('category-delete'))
                <div class="alert alert-danger">{{session('category-delete')}}</div>
            @endif
        </div>
        <div class="row">

            <div class="col-sm-3">
                <form method="post" action="{{route('category.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text"
                               id="name"
                               name="name"
                               class="form-control @error('name')is-invalid @enderror">
                        <div>
                            @error('name')
                            <span><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark btn-block">Submit</button>
                </form>
            </div>


                <div class="col-sm-9">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Category</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="users-table" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>

                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Delete</th>


                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>

                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Delete</th>


                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr>

                                            <td>{{$category->id}}</td>
                                            <td>{{$category->name}}</td>
                                            <td>{{$category->slug}}</td>
                                            <td>
                                                <form method="post" action="{{route('category.destroy',$category->id )}}">
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

        </div>

    @endsection


</x-admin-master>
