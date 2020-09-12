<script lang="ts">
	// @ts-check
	import type { ReferenceSchema } from './ReferenceSchema'

	export let reference:ReferenceSchema;
</script>

<div class="reference">
	<h2>{reference.title}</h2>
	<p>{reference.content}</p>
	<hr/>
	<ul>
	{#each reference.categories as cat}
		<li>{cat}</li>
	{/each}
	</ul>
</div>

<style lang="postcss">
	.reference {
		@apply border border-gray-300 p-8 rounded shadow-lg;

		h2 {
			@apply text-2xl pb-4;
		}

		hr {
			@apply my-4;
		}

		ul {
			@apply pl-0 flex flex-wrap;
			li {
				@apply inline p-4 capitalize;
			}
		}
	}
</style>
