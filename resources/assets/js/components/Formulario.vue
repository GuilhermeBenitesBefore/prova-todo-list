<template>

    <form v-bind:action="action" v-bind:method="defineMetodo" v-bind:enctype="enctype">

        <input v-if="alteraMetodo" type="hidden" name="_method" v-bind:value="alteraMetodo">
        <input v-if="token" type="hidden" name="_token" v-bind:value="token">

        <slot></slot>

    </form>

</template>

<script>
    export default {
        props: [
            'action', 'method', 'enctype', 'token'
        ],
        data: function () {
            return {
                alteraMetodo: ""
            }
        },
        computed: {
            defineMetodo: function () {
                if (this.method.toLowerCase() == "post" || this.method.toLowerCase() == "get") {
                    return this.method.toLowerCase();
                }
                if (this.method.toLowerCase() == "put") {
                    this.alteraMetodo = "put";
                }
                if (this.method.toLowerCase() == "delete") {
                    this.alteraMetodo = "delete";
                }
                return "post";
            }
        }
    }
</script>
