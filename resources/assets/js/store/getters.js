export default {
  getTodoList (state) {
    return state.todoList.todos
  },
  getTodoInit (state) {
    return state.todoForm.todoInit
  },
  getTodosDone (state) {
    return state.todoList.todos.filter(todo => todo.done)
  },
  getTodosPending (state) {
    return state.todoList.todos.filter(todo => !todo.done)
  },
  getEditMode (state) {
    return state.todoForm.isEditMode
  },
  getFormTags (state) {
    return state.todoForm.tags
  },
  getFormStartOptions (state) {
    return state.todoForm.startOptions
  },
  getFormEndOptions (state) {
    return state.todoForm.endOptions
  }
}
