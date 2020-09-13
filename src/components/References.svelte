<script lang="ts">
	// @ts-check
	import type { ReferenceSchema, ReferenceFilters } from './ReferenceSchema'
	import Reference from "./Reference.svelte";
	import ProjectFilters from "./ProjectFilters.svelte";
	import {blur} from 'svelte/transition';
	import {flip} from 'svelte/animate';
	import {stores} from "@sapper/app";

	export let references:ReferenceSchema[] = [];
	const currentFilters: ReferenceFilters = {};
	const {page} = stores()

	// build filters from reference categories
	references.forEach(r => {
		r.categories.forEach(c => {
			if (!currentFilters.hasOwnProperty(c)) {
				currentFilters[c] = Object.getOwnPropertyNames($page.query).length <= 0;
			}
		})
	})

	// filter by query
	Object.entries($page.query).forEach((entry) => {
		if (currentFilters.hasOwnProperty(entry[0])){
			currentFilters[entry[0]] = entry[1] === "1"
		}
	})

	// if we cleared the query filters, disable all filters
	$: if(Object.getOwnPropertyNames($page.query).length === 0) Object.getOwnPropertyNames(currentFilters).forEach((f) => currentFilters[f] = true)

	// filter the references based on the current filters
	$: filtered = references.filter(c => filter(currentFilters, c));

	const filter = (filters:ReferenceFilters, ref:ReferenceSchema) => {
		let ret = false
		for (const cat in filters) {
			if (filters[cat] === true) {
				if (ref.categories.includes(cat)) {
					ret = true;
				}
			}
		}
		return ret;
	}

	const toggleFilter = (e) => currentFilters[e.detail.cat] = e.detail.state;

</script>

<ProjectFilters filters={currentFilters} on:filter={toggleFilter}/>

<div class="projects">
	{#each filtered as ref (ref.id)}
		<div transition:blur|local animate:flip="{{duration: 200}}">
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
