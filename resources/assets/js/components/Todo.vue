<style>

</style>

<template>
    <div>
        <tr>
            <td>{{index + from }}</td>
            <td>
                <template v-ifs="!editing" >
                    <span @click="edit">{{todo.name}}</span>
                </template>
                <input v-model="todo.name" v-show="editing" @keyup.esc="unedit" @keyup.enter="save"><i class="fa fa-fw fa-edit" v-show="!editing" @click="edit"></i> <i class="fa fa-fw fa-check" @click="save"></i> <i class="fa fa-fw fa-close" @click="unedit"></i>
            </td>
            <td>{{todo.priority}}</td>
            <td>{{todo.done}}</td>
            <td>
                <div class="progress progress-xs">
                    <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                </div>
            </td>
            <td><span class="badge bg-red">55%</span></td>
            <td>
                <span class="btn btn-md btn-info">
                    <i class="fa fa-fw fa-edit" @click="edittodo"></i>
                </span>
                <span class="btn btn-md btn-danger">
                    <i class="fa fa-fw fa-trash" @click="deletetodo(index)"></i>
                </span>
            </td>
        </tr>
    </div>
</template>
<script>

export default {
    props: ['todo','index','from'],

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

        edit: function() {
            this.editing = true;
        },

        unedit: function() {
            this.editing = false;
        },

        save: function() {
            this.editing = false;
        },

        edittodo: function() {
            console.log('TODO editing');
        },

        deletetodo: function() {
            console.log('TODO deleting');
            this.$emit('todo-deleted', index);
        },
    }
}
</script>
