<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link href="{{ asset('style.css') }}" rel="stylesheet">

</head>

<body>
    <div class="container mt-5">
        @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        {{--create--}}
        <div class="card">
            <div class="card-header text-center font-weight-bold ">
                Laravel 8 - Example Formulaire
            </div>
            <div class="card-body">
                <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('store-form')}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Post</label>
                        <input type="text" id="title" name="title" class="form-control" required="">
                    </div> 
                    <div class="form-group">
                        <label for="exampleInputEmail1">paragraph</label>
                        <input type="text" id="paragraph" name="paragraph" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">description</label>
                        <input type="text" id="description" name="description" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">category</label>
                        <select type="text" id="category" name="category" class="form-control" required="">
                            <option>Anglais</option>
                            <option>Francais</option>
                            <option>Arabe</option>
                            <option>Bangla</option>
                        </select>
                    </div> 
                    <button type="submit" class="btn btn-primary">Create</button> 
                </form>
                <br>

                {{--UPDATE--}}
                <form method="post" action="{{route('member')}}">
                    @csrf
                    <div>
                        <select name="categoryupdate" id="categoryupdate">
                            @foreach ($categorys as $category)
                            <option value="{{$category->category}}">{{$category->category}}</option>
                            @endforeach
                        </select>
                        <input type="text" name="categoryName" id="category" value="" />
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>


                {{--DELETE--}}
                <form method="post" action="{{route('member')}}">
                    @csrf
                    <div>
                        <select name="categorydelete" id="categorydelete">
                            @foreach ($categorys as $category)
                            <option value="{{$category->category}}">{{$category->category}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Delete</button>
                </form> 
                

                

            </div>
        </div>
        
    </div>
</body>

</html>