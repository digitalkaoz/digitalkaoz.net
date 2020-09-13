<script context="module">
	export async function preload({ params, query }) {
		const response = await this.fetch('/data/professions.json');

		const professions  = await response.json()

		return {
			slug: params.slug,
			profession: professions.find(p => p.slug === params.slug)
		}
	}
</script>

<script lang="ts">
	// @ts-check
	import type { ProfessionsSchema } from '../../components/ProfessionsSchema'

	export let profession:ProfessionsSchema = {};
	export let slug;
</script>

<template>
	<h1>{profession.title}</h1>
	<p>{@html profession.content}</p>
	<a href="references?{slug}=1">To References</a>
</template>


<style lang="postcss">
	a {
		@apply py-8 block;
	}
</style>
