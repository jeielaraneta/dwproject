<template>
    <div class="container" id="container"></div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            read() {
                axios.get('/enrollment-data').then(({ data }) => {
                    console.log(data)
                });
            }
        }
    }
</script>
