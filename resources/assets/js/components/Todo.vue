<template>
    <tr>
        <td>{{index + from }}</td>
        <td>
            <div v-if="!editing">
                <span @dblclick="edit">{{todo.name}}</span>
                <button style="float: right;" type="button" class="btn btn-warning btn-flat btn-xs" v-show="!editing" @click="edit">
                    <i class="fa fa-fw fa-edit"></i>
                </button>
            </div>
            <div v-show="editing" @keyup.esc="unedit" @keyup.enter="save">
                <input v-model="todo.name" size="100">
                <div  style="float: right;">
                    <button type="button" class="btn btn-success btn-flat btn-xs" @click="save" v-show="editing">
                        <i class="fa fa-fw fa-check"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-flat btn-xs" v-show="editing" @click="unedit">
                        <i class="fa fa-fw fa-close"></i>
                    </button>
                </div>
            </div>
        </td>
        <td align="center">
            <div class="btn-group">
                <button type="button" class="btn btn-default btn-flat">
                    <span>{{todo.priority}}</span>
                </button>
                <button type="button" class="btn btn-default dropdown-toggle btn-flat" data-toggle="dropdown">
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li v-for="n in 10"><a href="#" @click="editTodoPriority(page,(n-1))">{{(n-1)}}</a></li>
                </ul>
            </div>
        </td>
        <td align="center">
            <div v-if="todo.done">
                <input type="checkbox" class="checkbox icheck" checked @click="edit">
            </div>

            <div v-else>
                <input type="checkbox" class="checkbox icheck" @click="edit">
            </div>
        </td>
        <td align="center">
            <div class="progress progress-xs">
                <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
            </div>
        </td>
        <td align="center"><span class="badge bg-red">55%</span></td>
        <td align="center">
            <div class="btn-group">
                <button type="button" class="btn btn-info btn-flat">
                    <i class="fa fa-edit" @click="edit"></i>
                </button>

                <button type="button" class="btn btn-danger btn-flat">
                    <i class="fa fa-trash" @click="deletetodo(index)"></i>
                </button>
            </div>
        </td>
    </tr>
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
        console.log('Component todo created.');
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
