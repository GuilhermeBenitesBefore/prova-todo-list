import { getYesterday } from '../shared/utils'

export default {
  todoForm: {
    todoInit: {
      title: '',
      description: '',
      start: '',
      end: '',
      done: false,
      tags: []
    },
    isEditMode: false,
    tags: [],
    startOptions: {
      to: getYesterday()
    },
    endOptions: {
      to: getYesterday()
    }
  },
  todoList: {
    todos: []
  }
}
