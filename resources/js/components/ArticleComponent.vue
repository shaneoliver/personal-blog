<template>
    <article>
        <h1>{{ article.title }}</h1>
        <p>By {{ article.user.name }} on {{ published_at }}</p>
        <p v-html="article.body"></p>
    </article>
</template>

<script>
export default {
    props: {
        article: {
            required: true,
            type: Object,
        },
        published_at: {
            type: String,
        }
    },
    mounted() {
        this.$el.querySelectorAll('pre code').forEach((block) => {
            hljs.highlightBlock(block);
        });
    }
}
</script>