<template>
    <div v-bind:class="'alert ' + defineClasse + ' alert-dismissible text-center'" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
        <slot></slot>
    </div>
</template>

<script>

    export default {
        props: ['classe'],
        computed: {
            defineClasse: function () {
                return this.classe || "alert-info";
            }
        }
    }

</script>