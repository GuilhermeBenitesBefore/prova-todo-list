import moment from 'moment';

export const tagsBeforeSave = (todo) => {
    todo.tags = todo.tags.map(tag => {
        if (tag.title) {
            return tag.title;
        }
        return tag;
    });
    return todo;
}

export const formateDate = (value) => {
    return moment(value).format('DD/MM/YYYY');
}