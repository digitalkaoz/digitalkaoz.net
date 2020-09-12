<script context="module">
	export async function preload() {
		const response = await this.fetch('/data/references.json');

		return {
			references: await response.json()
		}
	}
</script>

<script>
	export let references = [];
	import References from "../components/References.svelte";
</script>


<svelte:head>
	<title>References</title>
</svelte:head>

<template>
	<h1>References</h1>

	<References references={references}/>
</template>
