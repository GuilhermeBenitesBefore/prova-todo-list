import { getters } from '../../../store'

describe('Store.getters', () => {
  let state

  beforeEach(() => {
    state = {
      todoList: {
        todos: [
          { "id": 14, "title": "Teste #01", "description": null, "done": 1, "start": "2017-12-13", "end": "2017-12-15", "created_at": "2017-12-03 01:41:06", "updated_at": "2017-12-03 17:53:45", "tags": [{ "id": 67, "title": "asdasd", "created_at": "2017-12-03 17:53:45", "updated_at": "2017-12-03 17:53:45", "pivot": { "task_id": 14, "tag_id": 67 } }, { "id": 68, "title": "asd", "created_at": "2017-12-03 17:53:45", "updated_at": "2017-12-03 17:53:45", "pivot": { "task_id": 14, "tag_id": 68 } }, { "id": 69, "title": "asdasdasdasd", "created_at": "2017-12-03 17:53:45", "updated_at": "2017-12-03 17:53:45", "pivot": { "task_id": 14, "tag_id": 69 } }] },
          { "id": 16, "title": "Teste #02", "description": "Teste #02", "done": 0, "start": "2017-12-12", "end": "2017-12-21", "created_at": "2017-12-03 03:20:50", "updated_at": "2017-12-03 17:54:09", "tags": [] }
        ]
      }
    }
  })

  it('getTodoList', () => {
    const result = getters.getTodoList(state)
    expect(result.length).toEqual(2)

  })

  it('getTodosDone', () => {
    const result = getters.getTodosDone(state)
    expect(result).toEqual([{ "id": 14, "title": "Teste #01", "description": null, "done": 1, "start": "2017-12-13", "end": "2017-12-15", "created_at": "2017-12-03 01:41:06", "updated_at": "2017-12-03 17:53:45", "tags": [{ "id": 67, "title": "asdasd", "created_at": "2017-12-03 17:53:45", "updated_at": "2017-12-03 17:53:45", "pivot": { "task_id": 14, "tag_id": 67 } }, { "id": 68, "title": "asd", "created_at": "2017-12-03 17:53:45", "updated_at": "2017-12-03 17:53:45", "pivot": { "task_id": 14, "tag_id": 68 } }, { "id": 69, "title": "asdasdasdasd", "created_at": "2017-12-03 17:53:45", "updated_at": "2017-12-03 17:53:45", "pivot": { "task_id": 14, "tag_id": 69 } }] }])
    expect(result.length).toEqual(1)
  })

  it('getTodosPending', () => {
    const result = getters.getTodosPending(state)
    expect(result).toEqual([{ "id": 16, "title": "Teste #02", "description": "Teste #02", "done": 0, "start": "2017-12-12", "end": "2017-12-21", "created_at": "2017-12-03 03:20:50", "updated_at": "2017-12-03 17:54:09", "tags": [] }])
    expect(result.length).toEqual(1)
  })

})
