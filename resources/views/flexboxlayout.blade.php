<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<style>

	header {
		padding: 10px;
		margin: 10px;
		background-color: indianred;
	}

	h1 {
		text-align: center;
		color: white;
		line-height: 100px;
		margin: 0;
	}

	section {
		display: flex;
	}

	.flex-column {
		display: flex;
		flex-direction: row;
	}

	article {
		padding: 10px;
		margin: 10px;
		min-width: 200px;
		background-color: #0a568c;
	}

	footer {
		padding: 10px;
		margin: 10px;
		text-align: right;
		background-color: lightgrey;
	}

	nav {
		padding: 10px;
		margin: 10px;
		width: 50%;
		background-color: darkslategrey;
	}
</style>

<body>

<header>
	<h1>Simple flexbox example</h1>
</header>

<section>
	<nav>
		<ul>
			<li>Link 1</li>
			<li>Link 2</li>
			<li>Link 3</li>
			<li>About</li>
			<li>Contact</li>
		</ul>
	</nav>

	<section class="flex-column">
		<article>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis commodi cumque deleniti ea est eveniet fugit magni omnis ut velit. Alias error, maxime nisi non nostrum numquam ratione suscipit tenetur!</article>

		<article>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis commodi cumque deleniti ea est eveniet fugit magni omnis ut velit. Alias error, maxime nisi non nostrum numquam ratione suscipit tenetur!</article>

		<article>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis commodi cumque deleniti ea est eveniet fugit magni omnis ut velit. Alias error, maxime nisi non nostrum numquam ratione suscipit tenetur!</article>
	</section>

</section>

<footer class="footer">
	@copyright Paolo Dávila Inc.
</footer> <!-- end-footer -->

</body>
</html>