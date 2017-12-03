<template>
    <div>
        <form>
            <div class="form-group">
                <label for="title">Título</label>
                <input
                    type="text"
                    class="form-control"
                    id="title"
                    name="title"
                    v-model="todo.title" />
            </div>
            <div class="form-group">
                <label for="tags">Tags</label>
                <v-select
                    multiple
                    :options="tags"
                    :taggable="true"
                    v-model="todo.tags"
                    label="title">
                    <span slot="no-options">Sem opções correspondentes.</span>
                </v-select>
            </div>
            <div class="form-group">
                <label for="description">Descrição</label>
                <textarea
                    id="description"
                    class="form-control"
                    rows="3"
                    v-model="todo.description"></textarea>
            </div>
            <div class="form-group">
                <label for="start">Início</label>
                <datepicker
                    name="start"
                    format="dd/MM/yyyy"
                    input-class="form-control datepicker__input"
                    language="pt-br"
                    :required="true"
                    :disabled="startOptions"
                    @selected="handleStartChange"
                    v-model="todo.start"></datepicker>
            </div>
            <div class="form-group">
                <label for="end">Fim</label>
                <datepicker
                    name="end"
                    format="dd/MM/yyyy"
                    input-class="form-control datepicker__input"
                    language="pt-br"
                    :required="true"
                    :disabled="endOptions"
                    @selected="handleEndChange"
                    v-model="todo.end"></datepicker>
            </div>
            <div class="form-group" v-if="isEditMode">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" v-model="todo.done"> Concluído?
                    </label>
                </div>
            </div>
            <button
                type="button"
                class="btn btn-primary"
                v-if="!isEditMode"
                @click.prevent="addTodo()">Adicionar</button>
            <button
                type="button"
                class="btn btn-primary"
                v-if="isEditMode"
                @click.prevent="editTodo()">Atualizar</button>
            <button
                type="button"
                class="btn btn-danger"
                v-if="isEditMode"
                @click="removeTodo()">Apagar</button>
            <button
                type="button"
                class="btn btn-default"
                v-if="isEditMode"
                @click="cancelEditMode()">Cancelar</button>
        </form>
        <simplert :useRadius="true"
            :useIcon="true"
            ref="simplert">
        </simplert>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';
import Datepicker from 'vuejs-datepicker';
import moment from 'moment';
import vSelect from 'vue-select';
import Simplert from 'vue2-simplert';

export default {
    components: { Datepicker, vSelect, Simplert },
    computed: {
        ...mapGetters({
            todo: 'getTodoInit',
            isEditMode: 'getEditMode',
            tags: 'getFormTags',
            startOptions: 'getFormStartOptions',
            endOptions: 'getFormEndOptions'
        })
    },
    created() {
        this.$store.dispatch('TAG_LOAD');
    },
    methods: {
        addTodo() {
            this.handleTags();
            this.$store.dispatch('TODO_ADD', {
                ...this.todo,
                start: moment(this.todo.start).format('YYYY-MM-DD'),
                end: moment(this.todo.end).format('YYYY-MM-DD')
            });
        },
        editTodo() {
            this.handleTags();
            this.$store.dispatch('TODO_UPDATE', {
                ...this.todo,
                start: moment(this.todo.start).format('YYYY-MM-DD'),
                end: moment(this.todo.end).format('YYYY-MM-DD')
            });
        },
        removeTodo() {
            this.$refs.simplert.openSimplert({
                title: 'Atenção',
                message: 'Deseja remover este registro?',
                type: 'warning',
                useConfirmBtn: true,
                customCloseBtnText: 'Cancel',
                customCloseBtnClass: 'simplert__close simplert__close--radius',
                customConfirmBtnText: 'Ok',
                customConfirmBtnClass: 'simplert__confirm simplert__confirm--radius',
                onConfirm: () => {
                    this.$store.dispatch('TODO_REMOVE', this.todo);
                }
            });
        },
        handleStartChange(date) {
            this.$store.commit('FORM_CHANGE_START_OPTIONS', { date });
        },
        handleEndChange(date) {
            this.$store.commit('FORM_CHANGE_END_OPTIONS', { date });
        },
        handleTags() {
            this.todo.tags = this.todo.tags.map(tag => {
                if (tag.title) {
                    return tag.title;
                }
                return tag;
            });
        },
        cancelEditMode() {
            this.$store.dispatch('FORM_CANCEL');
        }
    }
}
</script>

<style>
.datepicker__input:read-only {
    background-color: #ffffff;
}
</style>
