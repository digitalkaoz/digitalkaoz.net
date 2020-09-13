<script context="module">
	export async function preload() {
		const response = await this.fetch('/data/references.json');

		return {
			references: await response.json()
		}
	}
</script>

<script lang="ts">
	// @ts-check
	import type { ProfessionsSchema } from '../components/ProfessionsSchema'
	import References from "../components/References.svelte";

	export let references = [];
	export const professions:ProfessionsSchema[] = [];
</script>


<svelte:head>
	<title>References</title>
</svelte:head>

<template>
	<h1>References</h1>

	<References {references}/>
</template>
