<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	@include('editor::head')
</head>
<body>
	<form action="{{url('admin/news/upload')}}" method="post" enctype="multipart/form-data">
		 <input type="hidden" name="_token" value="{{ csrf_token() }}">  
		 <div class="editor">
		 <textarea name="" id="myEditor" cols="30" rows="10"></textarea>
		 </div>
		 <input type="submit" value="上传">
	</form>
</body>
</html>