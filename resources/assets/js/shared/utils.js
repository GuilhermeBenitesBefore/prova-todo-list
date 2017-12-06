import Vue from 'vue'
import Toasted from 'vue-toasted'
import moment from 'moment'

Vue.use(Toasted, {
  duration: 4000,
  theme: 'bubble',
  singleton: true
})

export const tagsBeforeSave = (todo) => {
  todo.tags = todo.tags.map(tag => {
    if (tag.title) {
      return tag.title
    }
    return tag
  })
  return todo
}

export const formateDate = (value, format = 'DD/MM/YYYY') => {
  return moment(value).format(format)
}

export const showToastrError = () => {
  Vue.toasted.show('Ocorreu um erro!', {
    type: 'error',
    icon: 'error_outline'
  })
}

export const showToastrSuccess = (message = 'Cadastrado com sucesso!') => {
  Vue.toasted.show(message, {
    type: 'success',
    icon: 'done'
  })
}

export const getYesterday = () => {
  let date = new Date()
  date.setDate(date.getDate() - 1)
  return date
}
