<template>
    <main>
        <section>
            <h2>Tutti i post</h2>
            <ul>
                <li v-for="post in posts" :key="post.id">{{post.title}}</li>
            </ul>
        </section>
    </main>
</template>

<script>
export default {
    name: 'Main',

    props: {
        posts: Array
    }
}
</script>