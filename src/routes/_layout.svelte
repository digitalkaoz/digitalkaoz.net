<script>
	import Nav from '../components/Nav.svelte';
	import Tailwind from "../components/Tailwind.svelte";
	import PageLoadingBar from "sapper-page-loading-bar/PageLoadingBar.svelte"
	import { fade } from "svelte/transition"
	import { stores } from "@sapper/app"
	export let segment;
	const { preloading } = stores()
</script>

<style global lang="postcss">
	main {
		@apply m-auto p-8;

		h1 {
			@apply text-4xl;
		}

	}
</style>

<template>
	<Tailwind/>
	<Nav {segment}/>

	<PageLoadingBar {preloading}/>

	<main class="container" transition:fade>
		<slot></slot>
	</main>
</template>
