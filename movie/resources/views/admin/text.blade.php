<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>编辑器</title>
@include('UEditor::head');
</head>
<body>
	<form action="">
		标题：<input type="text" name="title">
<!-- 加载编辑器的容器 -->
		<script id="container" name="content" type="text/plain">
		    这里写你的初始化内容
		</script>

		<!-- 实例化编辑器 -->
		<script type="text/javascript">
		    var ue = UE.getEditor('container');
		</script>

	</form>
</body>
</html>