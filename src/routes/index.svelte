<script>
	import Tailwind from "../components/Tailwind.svelte";
</script>

<svelte:head>
	<title>Sapper project template</title>
</svelte:head>

<Tailwind/>
<h1>Great success!</h1>

<figure>
	<img alt='Success Kid' src='successkid.jpg'>
	<figcaption>Have fun with Sapper!</figcaption>
</figure>

<p><strong>Try editing this file (src/routes/index.svelte) to test live reloading.</strong></p>

<style>
	figure {
		@apply border border-blue-500 p-8;
	}
</style>
