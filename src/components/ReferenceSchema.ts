export type ReferenceSchema = {
	id: string;
	title: string;
	content: string,
	categories: string[];
}

export type ReferenceFilters = {
	[key:string]: boolean;
}
