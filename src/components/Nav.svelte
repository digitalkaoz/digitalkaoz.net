<script lang="ts">
	// @ts-check
	import type {ProfessionsSchema} from './ProfessionsSchema'

	export let segment: string;
	export let path:string;
	export let professions: ProfessionsSchema[] = [];
</script>

<style>
	nav {
		border-bottom: 1px solid rgba(255, 62, 0, 0.1);
		font-weight: 300;
		padding: 0 1em;
	}

	ul {
		margin: 0;
		padding: 0;
	}

	/* clearfix */
	ul::after {
		content: '';
		display: block;
		clear: both;
	}

	li {
		display: block;
		float: left;
	}

	[aria-current] {
		position: relative;
		display: inline-block;
	}

	[aria-current]::after {
		position: absolute;
		content: '';
		width: calc(100% - 1em);
		height: 2px;
		background-color: rgb(255, 62, 0);
		display: block;
		bottom: -1px;
	}

	a {
		text-decoration: none;
		padding: 1em 0.5em;
		display: block;
	}
</style>

<nav>
	<ul>
		<li><a aria-current="{segment === undefined ? 'page' : undefined}" href=".">home</a></li>
		<li><a aria-current="{segment === 'references' ? 'page' : undefined}" href="references"
			   rel=prefetch>references</a></li>

		{#each professions as prof}
			<li><a aria-current="{path === `/p/${prof.slug}` ? 'page' : undefined}" href="p/{prof.slug}"
				   rel=prefetch>{prof.title}</a></li>
		{/each}
	</ul>
</nav>
