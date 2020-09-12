<script lang="ts">
	// @ts-check
	import type { ReferenceSchema, ReferenceFilters } from './ReferenceSchema'
	import Reference from "./Reference.svelte";
	import ProjectFilters from "./ProjectFilters.svelte";
	import {blur} from 'svelte/transition';
	import {flip} from 'svelte/animate';

	export let references:ReferenceSchema[] = [];
	const currentFilters: ReferenceFilters = {
	}

	references.forEach(r => {
		r.categories.forEach(c => {
			if (!currentFilters.hasOwnProperty(c)) {
				currentFilters[c] = true;
			}
		})
	})

	$: filtered = references.filter(c => filter(currentFilters, c));

	const filter = (filters:ReferenceFilters, ref:ReferenceSchema) => {
		for (const cat in filters) {
			if (filters[cat] === false) {
				if (ref.categories.includes(cat)) {
					return false;
				}
			}
		}
		return true;
	}

	const toggleFilter = (e) => {
		currentFilters[e.detail.cat] = e.detail.state;
	}

</script>

<ProjectFilters filters={currentFilters} on:filter={toggleFilter}/>

<div class="projects">
	{#each filtered as ref (ref.id)}
		<div transition:blur animate:flip="{{duration: 200}}">
			<Reference reference={ref}/>
		</div>
	{/each}
</div>

<style lang="postcss">
	.projects {
		@apply grid grid-cols-1 gap-8 m-auto;

		@screen lg {
			@apply grid-cols-2;
		}
	}
</style>
