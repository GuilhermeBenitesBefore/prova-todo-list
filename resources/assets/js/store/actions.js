import { showToastrError, showToastrSuccess } from '../shared/utils'

export default {
  TODO_LOAD: ({ commit }) => {
    axios.get(`${BASE_URL}/api/tasks`).then(resp => {
      commit('TODO_SET', {
        todos: resp.data
      })
    })
  },
  TODO_ADD: ({ commit, dispatch }, payload) => {
    axios.post(`${BASE_URL}api/tasks`, payload).then(resp => {
      if (resp.data.error) {
        showToastrError()
        return
      }
      showToastrSuccess()
      commit('TODO_INITIALIZE')
      dispatch('TODO_LOAD')
      dispatch('TAG_LOAD')
    })
  },
  TODO_UPDATE: ({ commit, dispatch }, payload) => {
    axios.put(`${BASE_URL}api/tasks/${payload.id}`, payload).then(resp => {
      if (resp.data.error) {
        showToastrError()
        return
      }
      showToastrSuccess('Atualizado com sucesso!')
      commit('TODO_INITIALIZE')
      dispatch('TODO_LOAD')
      dispatch('TAG_LOAD')
    })
  },
  TODO_REMOVE: ({ commit, dispatch }, payload) => {
    axios.delete(`${BASE_URL}api/tasks/${payload.id}`).then(resp => {
      if (resp.data.error) {
        showToastrError()
        return
      }
      showToastrSuccess('Removido com sucesso!')
      commit('TODO_INITIALIZE')
      dispatch('TODO_LOAD')
      dispatch('TAG_LOAD')
    })
  },
  TAG_LOAD: ({ commit }, payload) => {
    axios.get(`${BASE_URL}/api/tags`).then(resp => {
      commit('FORM_SET_TAGS', {
        tags: resp.data
      })
    })
  },
  FORM_CANCEL: ({ commit, dispatch }) => {
    commit('TODO_INITIALIZE')
    dispatch('TODO_LOAD')
  }
}
