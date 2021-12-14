<x-admin-master>
    @section('content')



        <h1>create</h1>

        {!! Form::open(['method' => 'POST','route'=>'product.store','files'=>true]) !!}
        @csrf
        <div class="form-group">
            {!! Form::label('title', 'Title') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('photo', 'image') !!}
            {!! Form::file('photo',null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('price', 'Price') !!}
            {!! Form::number('price', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('category_id', 'Category') !!}
            {!! Form::select('category_id',[''=>'choose category'] + $categories, null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Create Post', ['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    @endsection
</x-admin-master>
