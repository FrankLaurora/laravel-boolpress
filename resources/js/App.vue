<template>
    <div>
        <Header/>
        <Main :posts="posts"/>
    </div>
</template>

<script>
import Header from './components/Header.vue';
import Main from './components/Main.vue'

    export default {
        name: 'App',

        components: {
            Header,
            Main
        },

        data() {
            return {
                'posts' : []
            }
        },

        mounted () {
            axios.get('http://localhost:8000/api/posts')
                .then(response => {
                    this.posts = response.data.data;
                })
                .catch(error => {
                    console.log(error)
                })
        }
    }
</script>
