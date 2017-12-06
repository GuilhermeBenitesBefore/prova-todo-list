import moment from 'moment'

export default {
  TODO_SET: (state, { todos }) => {
    state.todoList.todos = todos
  },
  TODO_INITIALIZE: (state, payload) => {
    state.todoForm.todoInit = {
      title: '',
      description: '',
      start: '',
      end: '',
      done: false,
      tags: []
    }
    state.todoForm.startOptions = {
      to: new Date()
    }
    state.todoForm.endOptions = {
      to: new Date()
    }
    state.todoForm.isEditMode = false
  },
  FORM_SET_EDIT: (state, payload) => {
    state.todoForm.isEditMode = true
    state.todoForm.todoInit = payload
  },
  FORM_SET_TAGS: (state, { tags }) => {
    state.todoForm.tags = tags
  },
  FORM_SET_START_OPTIONS: (state, { date }) => {
    state.todoForm.endOptions = { ...state.todoForm.endOptions, to: date }
    if (state.todoForm.todoInit.end && moment(date) > moment(state.todoForm.todoInit.end)) {
      state.todoForm.todoInit.end = ''
    }
  },
  FORM_SET_END_OPTIONS: (state, { date }) => {
    state.todoForm.startOptions = { ...state.todoForm.startOptions, from: date }
    if (state.todoForm.todoInit.start && moment(date) < moment(state.todoForm.todoInit.start)) {
      state.todoForm.todoInit.start = ''
    }
  }
}
