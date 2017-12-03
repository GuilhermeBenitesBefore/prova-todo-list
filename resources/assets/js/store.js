import Vue from 'vue';
import Vuex from 'vuex';
import Toasted from 'vue-toasted';

Vue.use(Vuex);
Vue.use(Toasted, {
    duration: 4000,
    theme: 'bubble',
    singleton: true
});

const showToastrError = () => {
    Vue.toasted.show('Ocorreu um erro!', {
        type: 'error',
        icon: 'error_outline'
    });
}

const showToastrSuccess = (message = 'Cadastrado com sucesso!') => {
    Vue.toasted.show(message, {
        type: 'success',
        icon: 'done'
    });
}

export default new Vuex.Store({
    state: {
        todoForm: {
            todoInit: {},
            isEditMode: false,
            tags: []
        },
        todoList: {
            todos: []
        }
    },
    getters: {
        getTodoList(state) {
            return state.todoList.todos;
        },
        getTodoInit(state) {
            return state.todoForm.todoInit;
        },
        getTodosDone(state) {
            return state.todoList.todos.filter(todo => todo.done);
        },
        getTodosPending(state) {
            return state.todoList.todos.filter(todo => !todo.done);
        },
        getEditMode(state) {
            return state.todoForm.isEditMode;
        },
        getFormTags(state) {
            return state.todoForm.tags;
        }
    },
    actions: {
        TODO_LOAD: ({ commit }) => {
            axios.get(`${BASE_URL}/api/tasks`).then(resp => {
                commit('TODO_SET', {
                    todos: resp.data
                });
            });
        },
        TODO_ADD: ({ commit, dispatch }, payload) => {
            axios.post(`${BASE_URL}api/tasks`, payload).then(resp => {
                if (resp.data.error) {
                    showToastrError()
                    return;
                }
                showToastrSuccess()
                commit('TODO_INITIALIZE');
                dispatch('TODO_LOAD');
                dispatch('TAG_LOAD');
            });
        },
        TODO_UPDATE: ({ commit, dispatch }, payload) => {
            axios.put(`${BASE_URL}api/tasks/${payload.id}`, payload).then(resp => {
                if (resp.data.error) {
                    showToastrError()
                    return;
                }
                showToastrSuccess('Atualizado com sucesso!')
                commit('TODO_INITIALIZE');
                dispatch('TODO_LOAD');
                dispatch('TAG_LOAD');
            });
        },
        TODO_REMOVE: ({ commit, dispatch }, payload) => {
            axios.delete(`${BASE_URL}api/tasks/${payload.id}`).then(resp => {
                if (resp.data.error) {
                    showToastrError()
                    return;
                }
                showToastrSuccess('Removido com sucesso!')
                commit('TODO_INITIALIZE');
                dispatch('TODO_LOAD');
                dispatch('TAG_LOAD');
            });
        },
        TAG_LOAD: ({ commit }, payload) => {
            axios.get(`${BASE_URL}/api/tags`).then(resp => {
                commit('FORM_SET_TAGS', {
                    tags: resp.data
                });
            });
        },
        FORM_CANCEL: ({ commit, dispatch }) => {
            commit('TODO_INITIALIZE');
            dispatch('TODO_LOAD');
        }
    },
    mutations: {
        TODO_SET: (state, { todos }) => {
            state.todoList.todos = todos;
        },
        TODO_INITIALIZE: (state, payload) => {
            state.todoForm.todoInit = {};
            state.todoForm.isEditMode = false;
        },
        FORM_SET_EDIT: (state, payload) => {
            state.todoForm.isEditMode = true;
            state.todoForm.todoInit = payload;
        },
        FORM_SET_TAGS: (state, { tags }) => {
            state.todoForm.tags = tags;
        }
    }
});
