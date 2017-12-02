@extends('content')

@section('todo')
<?php foreach($todos as $todo) : ?>
    <div class="row">
        <h3><?= $todo->title; ?></h3>
    </div>
    <div class="row">
        <div class="col-md-12">
            <label><?= $todo->description; ?></label>
        <div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button type="button" class="btn btn-primary btn-xs"><?= $todo->category->name ?></button>
            <i class="fa fa-flag-checkered" aria-hidden="true"></i> <?= $todo->deadline ?>
            <p class="pull-right">
                <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
            </p>
        </div>
    </div>
<?php endforeach ?>
@stop