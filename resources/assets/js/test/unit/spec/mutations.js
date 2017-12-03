import mutations from '../../../store/mutations'
import moment from 'moment'

const {
  TODO_INITIALIZE,
  FORM_SET_EDIT,
  FORM_SET_START_OPTIONS,
  FORM_SET_END_OPTIONS
} = mutations

describe('mutations', () => {
  const date = new Date()
  let state

  beforeEach(() => {
    state = {
      todoForm: {
        todoInit: { "id": 14, "title": "Teste #01", "description": null, "done": 1, "start": "2017-12-13", "end": "2017-12-15", "created_at": "2017-12-03 01:41:06", "updated_at": "2017-12-03 17:53:45", "tags": [{ "id": 67, "title": "asdasd", "created_at": "2017-12-03 17:53:45", "updated_at": "2017-12-03 17:53:45", "pivot": { "task_id": 14, "tag_id": 67 } }, { "id": 68, "title": "asd", "created_at": "2017-12-03 17:53:45", "updated_at": "2017-12-03 17:53:45", "pivot": { "task_id": 14, "tag_id": 68 } }, { "id": 69, "title": "asdasdasdasd", "created_at": "2017-12-03 17:53:45", "updated_at": "2017-12-03 17:53:45", "pivot": { "task_id": 14, "tag_id": 69 } }] },
        startOptions: {
          to: date,
          from: date
        },
        endOptions: {
          to: date
        },
        isEditMode: true
      }
    }
  })

  it('TODO_INITIALIZE', () => {
    TODO_INITIALIZE(state)
    expect(state.todoForm.isEditMode).toEqual(false)
    expect(state.todoForm.todoInit).toEqual({
      title: '',
      description: '',
      start: '',
      end: '',
      done: false,
      tags: []
    })
    expect(Object.keys(state.todoForm.startOptions)).toEqual(['to'])
    expect(Object.keys(state.todoForm.endOptions)).toEqual(['to'])
  })

  it('FORM_SET_EDIT', () => {
    state.todoForm.isEditMode = false
    state.todoForm.todoInit.title = 'Teste #01'
    FORM_SET_EDIT(state, {
      ...state.todoForm.todoInit,
      title: 'test'
    })
    expect(state.todoForm.isEditMode).toBe(true)
    expect(state.todoForm.todoInit).not.toEqual(jasmine.objectContaining({
      title: 'Teste #01'
    }))
  })

  it('FORM_SET_START_OPTIONS', () => {
    const date = new Date('2017-12-03')
    state.todoForm.todoInit.end = new Date('2017-12-02')
    FORM_SET_START_OPTIONS(state, { date })
    expect(state.todoForm.endOptions.to).toEqual(date)
    expect(state.todoForm.todoInit.end).toEqual('')
  })

  it('FORM_SET_END_OPTIONS', () => {
    const date = new Date('2017-12-02')
    state.todoForm.todoInit.start = new Date('2017-12-03')
    FORM_SET_END_OPTIONS(state, { date })
    expect(state.todoForm.startOptions.from).toEqual(date)
    expect(state.todoForm.todoInit.start).toEqual('')
  })
})
