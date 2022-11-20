<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add Template</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
   
	

	
</head>
<body>
	<div class="container mt-5">
		<form method="POST" action="{{ route('save.template') }}">
            @csrf
			
			<div class="form-group mt-4">
				<label>Template</label>
				<textarea id="template" name="template"></textarea>
			</div>
			
			<button class="btn btn-primary mt-4">Save</button>
		</form>
	</div>
	
</body>
</html>