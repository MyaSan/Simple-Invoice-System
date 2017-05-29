<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<script src="{{ asset('js/jquery.js') }}"></script>
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bulma-docs.css') }}">
</head>
<body>
	@yield('content')
	<script src="{{ asset('js/invoice.js') }}"></script>
</body>
</html>