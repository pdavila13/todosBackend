<style>

</style>

<template>
    <div>

    </div>
</template>
<script>

export default {
    data() {
        return {
            editing: false
        }
    },

    created() {
        console.log('Component todolist created.');
        this.fetchData();
    },
    methods: {
        hello: function() {
            console.log('Hello');
        },
    }
}
</script>
