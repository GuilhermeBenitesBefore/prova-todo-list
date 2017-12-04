<template>
    <div v-bind:class="defineClasse">
        <div class="panel-heading">{{titulo}}</div>

        <div class="panel-body">
            <slot></slot>
        </div>
    </div>
</template>

<script>

    export default {
        props: ['titulo', 'classe'],
        computed: {
            defineClasse: function() {
                return "panel " +(this.classe || "panel-default");
            }
        }
    }

</script>

