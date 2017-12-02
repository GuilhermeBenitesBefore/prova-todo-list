@extends('principal')
<form>
  <div class="form-group">
    <label for="tituloTodo">Título</label>
    <input type="text" class="form-control" id="tituloTodo" name="tituloTodo" placeholder="Título Taréfa">
  </div>
  <div class="form-group">
    <label for="tituloTodo">Descrição</label>
    <input type="text" class="form-control" id="descricaoTodo" name="descricaoTodo" placeholder="Descrição Taréfa">
  </div>
  
  <div class="form-check">
  <label for="tituloTodo">Vencimento: </label>
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input">1 ano
      <input type="checkbox" class="form-check-input">1 mês
      <input type="checkbox" class="form-check-input">1 dia
      <input type="checkbox" class="form-check-input">1 Hora
    </label>
  </div>
  <button type="submit" class="btn btn-primary">Criar Tarefa</button>
</form>