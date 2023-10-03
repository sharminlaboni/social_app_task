<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="pull-left">
			<h2>post index</h2>
		</div>
		<div class="pull-right">
		<a class="btn btn-success" href=" {{url('/home')}}"> Home</a>

			<a class="btn btn-success" href=" {{route('postcreate')}}"> Create New Post</a>
		</div>
	</div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
	<p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
	<tr>
		<th>No</th>
		<th>user_id</th>
		<th>content</th>
		<th>image</th>

		<th width="280px">Action</th>
	</tr>
	@foreach ($post as $post)

	<tr>
    <td>{{ $post->id }}</td>
		<td>{{ $post->user?->id }}</td>
		<td>{{ $post->content }}</td>
        
		<td><img width="100px" height="100px" src="{{asset('storage/post/' .$post->image)}} "/></td>
		<td>
			<form action="{{ route('postdestroy', $post->id) }}" method="POST">
				
				<a class="btn btn-info" href="{{ route('postshow', $post->id) }}">Show</a>
				
				<a class="btn btn-primary" href="{{ route('postedit', $post->id) }}">Edit</a>
				
				@csrf
				@method('DELETE')
				
				<button type="submit" class="btn btn-danger">Delete</button>
			</form>
		</td>
	</tr>
	@endforeach
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 


</body>
</html>