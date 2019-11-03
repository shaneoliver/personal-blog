<template>
	<div class="editor">
		<div class="form-group">
			<label for="title">Title</label>
			<input id="title" class="form-control" placeholder="The long road to mastering the perfect cartwheel." type="text" v-model="article.title">
		</div>
		<div class="form-group mb-5">
			<label for="excerpt">Excerpt</label>
			<textarea id="excerpt" class="form-control" rows="3" placeholder="A short summary of this article" v-model="article.excerpt"></textarea>
		</div>

		<editor-menu-bar :editor="editor" v-slot="{ commands, isActive }">
			<div class="menubar pb-3">

				<button
				class="btn btn-secondary"
				:class="{ 'is-active': isActive.bold() }"
				@click="commands.bold"
				>
					<icon name="bold" />
				</button>

				<button
				class="btn btn-secondary"
				:class="{ 'is-active': isActive.italic() }"
				@click="commands.italic"
				>
					<icon name="italic" />
				</button>

				<button
				class="btn btn-secondary"
				:class="{ 'is-active': isActive.strike() }"
				@click="commands.strike"
				>
					<icon name="strike" />
				</button>

				<button
				class="btn btn-secondary"
				:class="{ 'is-active': isActive.underline() }"
				@click="commands.underline"
				>
					<icon name="underline" />
				</button>

				<button
				class="btn btn-secondary"
				:class="{ 'is-active': isActive.code() }"
				@click="commands.code"
				>
					<icon name="code" />
				</button>

				<button
				class="btn btn-secondary"
				:class="{ 'is-active': isActive.paragraph() }"
				@click="commands.paragraph"
				>
					<icon name="paragraph" />
				</button>

				<button
				class="btn btn-secondary"
				:class="{ 'is-active': isActive.heading({ level: 1 }) }"
				@click="commands.heading({ level: 1 })"
				>
					H1
				</button>

				<button
				class="btn btn-secondary"
				:class="{ 'is-active': isActive.heading({ level: 2 }) }"
				@click="commands.heading({ level: 2 })"
				>
					H2
				</button>

				<button
				class="btn btn-secondary"
				:class="{ 'is-active': isActive.heading({ level: 3 }) }"
				@click="commands.heading({ level: 3 })"
				>
					H3
				</button>

				<button
				class="btn btn-secondary"
				:class="{ 'is-active': isActive.bullet_list() }"
				@click="commands.bullet_list"
				>
					<icon name="ul" />
				</button>

				<button
				class="btn btn-secondary"
				:class="{ 'is-active': isActive.ordered_list() }"
				@click="commands.ordered_list"
				>
					<icon name="ol" />
				</button>

				<button
				class="btn btn-secondary"
				:class="{ 'is-active': isActive.blockquote() }"
				@click="commands.blockquote"
				>
					<icon name="quote" />
				</button>

				<button
				class="btn btn-secondary"
				:class="{ 'is-active': isActive.code_block() }"
				@click="commands.code_block"
				>
					<icon name="code" />
				</button>

				<button
				class="btn btn-secondary"
				@click="commands.horizontal_rule"
				>
				<icon name="hr" />
				</button>

				<button
				class="btn btn-secondary"
				@click="commands.undo"
				>
					<icon name="undo" />
				</button>

				<button
				class="btn btn-secondary"
				@click="commands.redo"
				>
					<icon name="redo" />
				</button>

			</div>
		</editor-menu-bar>

		<label for="body">Content of the article</label>
		<editor-content id="body" class="editor__content mb-3" :editor="editor" />

		<button class="btn btn-outline-secondary" @click="save">Save</button>
		<button class="btn btn-primary" @click="publish">Publish</button>
		
		<div class="alert alert-danger mt-3" v-if="errors">
			<p>You have some errors.</p>
			<ul>
				<li v-for="error in errors">{{ error[0] }}</li>
			</ul>
		</div>

		<div class="alert alert-success mt-3" v-if="success">
			{{ success }}
		</div>
	</div>
</template>

<script>
import Icon from './Icon'
import { Editor, EditorContent, EditorMenuBar } from 'tiptap'
import {
	Blockquote,
	CodeBlock,
	HardBreak,
	Heading,
	HorizontalRule,
	OrderedList,
	BulletList,
	ListItem,
	TodoItem,
	TodoList,
	Bold,
	Code,
	Italic,
	Link,
	Strike,
	Underline,
	History,
} from 'tiptap-extensions'

export default {
	components: {
		EditorContent,
		EditorMenuBar,
		Icon,
	},
  	data() {
		return {
			editor: new Editor({
				extensions: [
					new Blockquote(),
					new BulletList(),
					new CodeBlock(),
					new HardBreak(),
					new Heading({ levels: [1, 2, 3] }),
					new HorizontalRule(),
					new ListItem(),
					new OrderedList(),
					new TodoItem(),
					new TodoList(),
					new Link(),
					new Bold(),
					new Code(),
					new Italic(),
					new Strike(),
					new Underline(),
					new History(),
				],
				content: '',
				onUpdate: ({ getHTML }) => {
					this.article.body = getHTML()
				},
			}),
			article: {
				title: '',
				body: '',
				excerpt: '',
				publish: false,
			},
			success: '',
			errors: '',
		}
	},
	mounted() {
	},

	beforeDestroy() {
		this.editor.destroy()
	},
	
	methods: {
		clearErrors() {
			this.errors = '';
		},
		save() {
			this.submit();
		},
		publish() {
			this.article.publish = true;
			this.submit();
		},
		submit() {
			this.clearErrors();

			axios.post('/articles', this.article)
				.then(response => {
					this.success = 'Your article was saved successfully.'
				})
				.catch(error => {
					this.errors = error.response.data.errors;
				})
		},
	}
}
</script>
