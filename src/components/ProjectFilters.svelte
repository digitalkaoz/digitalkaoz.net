<script lang="ts">
	// @ts-check
	import type {ReferenceFilters} from './ReferenceSchema'
	import {createEventDispatcher} from 'svelte';

	const dispatch = createEventDispatcher();
	const toggle = (e: Event, val:string) => dispatch("filter", {cat: val, state: e.target?.checked});

	export let filters: ReferenceFilters = {};
</script>

<div>
	{#each Object.entries(filters) as [name, state]}
		<label class={state===true ? "" : "off"}>
			{name}
			<input class="form-checkbox" type="checkbox" bind:checked={filters[name]}
				   on:change={(e) => toggle(e, name)}/>
		</label>
	{/each}
</div>

<style lang="postcss">
	div {
		@apply border-b border-gray-300 flex justify-between mb-8 flex-wrap;

		label {
			@apply capitalize p-8 inline-flex items-center;

			&:nth-of-type(odd) {
				@apply pl-0;
			}

			&:nth-of-type(even) {
				@apply pr-0;
			}

			input {
				@apply h-6 w-6 opacity-75 text-gray-400 ml-4;
			}

			&.off {
				@apply line-through opacity-50 transition-opacity;
			}
		}
	}
</style>
