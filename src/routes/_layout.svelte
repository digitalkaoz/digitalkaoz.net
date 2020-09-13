<script context="module">
	export async function preload() {
		const response = await this.fetch('/data/professions.json');

		return {
			professions: await response.json()
		}
	}
</script>

<script lang="ts">
	// @ts-check
	import type { ProfessionsSchema } from '../components/ProfessionsSchema'

	import Nav from '../components/Nav.svelte';
	import Tailwind from "../components/Tailwind.svelte";
	import PageLoadingBar from "sapper-page-loading-bar/PageLoadingBar.svelte"
	import {fade} from "svelte/transition"
	import {stores} from "@sapper/app"

	export let segment;
	export let professions:ProfessionsSchema[] = [];

	const {preloading, page} = stores()

	$: path  = $page.path;
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
	<Nav {segment} {professions} {path}/>

	<PageLoadingBar {preloading}/>

	{#if !$preloading}
		<main class="container" transition:fade>
			<slot></slot>
		</main>
	{/if}
</template>
