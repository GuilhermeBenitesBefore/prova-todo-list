<template>
    <div class="row">
        <div class="col-md-5">
            <div class="panel panel-primary">
                <div class="panel-heading">TodoList</div>
                <div class="panel-body">
                    <form>
                        <div class="form-group">
                            <label class="control-label" for="name">Name</label>
                            <input
                                type="text"
                                class="form-control"
                                id="name"
                                name="name"
                                placeholder="Name" />
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="tags">Tags</label>
                            <v-select
                                multiple
                                :taggable="true"
                                label="name"></v-select>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea
                                id="description"
                                class="form-control"
                                rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="start">Start</label>
                            <datepicker
                                name="start"
                                format="dd/MM/yyyy"
                                input-class="form-control"
                                language="pt-br"
                                :required="true"></datepicker>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="end">End</label>
                            <datepicker
                                name="end"
                                format="dd/MM/yyyy"
                                input-class="form-control"
                                language="pt-br"
                                :required="true"></datepicker>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Done
                            </label>
                        </div>
                        <button
                            type="button"
                            class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-heading">Tasks</div>
                <div class="panel-body">

                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#pending" data-toggle="tab">Pending</a>
                        </li>
                        <li>
                            <a href="#done" data-toggle="tab">Done</a>
                        </li>
                    </ul>

                    <div class="tab-content">

                        <div class="tab-pane active" id="pending">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Start</th>
                                        <th>End</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="cursor">
                                        <td>title</td>
                                        <td>description</td>
                                        <td>start</td>
                                        <td>end</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane" id="done">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Start</th>
                                        <th>End</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="cursor">
                                        <td>title</td>
                                        <td>description</td>
                                        <td>start</td>
                                        <td>end</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Datepicker from 'vuejs-datepicker';
import vSelect from 'vue-select';

export default {
    components: { Datepicker, vSelect }
}
</script>
