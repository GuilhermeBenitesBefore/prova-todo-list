<template>
    <form>
        <div class="form-group">
            <label class="control-label" for="title">Title</label>
            <input
                type="text"
                class="form-control"
                id="title"
                name="title"
                placeholder="Title"
                v-model="todo.title" />
        </div>
        <div class="form-group">
            <label class="control-label" for="tags">Tags</label>
            <v-select
                multiple
                :options="tags"
                :taggable="true"
                v-model="todo.tags"
                label="title"></v-select>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea
                id="description"
                class="form-control"
                rows="3"
                v-model="todo.description"></textarea>
        </div>
        <div class="form-group">
            <label class="control-label" for="start">Start</label>
            <datepicker
                name="start"
                format="dd/MM/yyyy"
                input-class="form-control"
                language="pt-br"
                :required="true"
                @selected="handleStartChange"
                :disabled="rangeStart"
                v-model="todo.start"></datepicker>
        </div>
        <div class="form-group">
            <label class="control-label" for="end">End</label>
            <datepicker
                name="end"
                format="dd/MM/yyyy"
                input-class="form-control"
                language="pt-br"
                :required="true"
                :disabled="rangeEnd"
                @selected="handleEndChange"
                v-model="todo.end"></datepicker>
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" v-model="todo.done"> Done
            </label>
        </div>
        <button
            type="button"
            class="btn btn-primary"
            v-if="!isEditMode"
            @click.prevent="addTodo()">Submit</button>
        <button
            type="button"
            class="btn btn-primary"
            v-if="isEditMode"
            @click.prevent="editTodo()">Submit</button>
        <button
            type="button"
            class="btn btn-danger"
            v-if="isEditMode"
            @click="removeTodo()">Remove</button>
        <button
            type="button"
            class="btn btn-default"
            v-if="isEditMode"
            @click="cancelEditMode()">Cancel</button>
    </form>
</template>

<script>
import { mapGetters } from 'vuex';
import Datepicker from 'vuejs-datepicker';
import moment from 'moment';
import vSelect from 'vue-select';

export default {
    components: { Datepicker, vSelect },
    computed: {
        ...mapGetters({
            todo: 'getTodoInit',
            isEditMode: 'getEditMode',
            tags: 'getFormTags'
        })
    },
    data() {
        return {
            rangeStart: {
                to: new Date()
            },
            rangeEnd: {
                to: new Date()
            }
        }
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
            this.resetRangeDates();
        },
        editTodo() {
            this.handleTags();
            this.$store.dispatch('TODO_UPDATE', {
                ...this.todo,
                start: moment(this.todo.start).format('YYYY-MM-DD'),
                end: moment(this.todo.end).format('YYYY-MM-DD')
            });
            this.resetRangeDates();
        },
        removeTodo() {
            this.$store.dispatch('TODO_REMOVE', this.todo);
            this.resetRangeDates();
        },
        handleStartChange(date) {
            this.rangeEnd = {...this.rangeEnd, to: date};
            if (this.todo.end && moment(date) > moment(this.todo.end)) {
                this.todo.end = null;
            }
        },
        handleEndChange(date) {
            this.rangeStart = {...this.rangeStart, from: date};
            if (this.todo.start && moment(date) < moment(this.todo.start)) {
                this.todo.start = null;
            }
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
            this.resetRangeDates();
        },
        resetRangeDates() {
            this.rangeStart = {
                to: new Date()
            };
            this.rangeEnd = {
                to: new Date()
            };
        }
    }
}
</script>
