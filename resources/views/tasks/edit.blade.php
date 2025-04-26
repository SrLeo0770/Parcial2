<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Task</title>

    <style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #e0f7fa;
        color: #333;
    }
    .container {
        max-width: 600px;
        margin: 50px auto;
        background: #ffffff;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    h1 {
        text-align: center;
        font-size: 2rem;
        color: #007BFF;
        margin-bottom: 20px;
    }
    form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }
    label {
        font-weight: bold;
        margin-bottom: 5px;
    }
    input, textarea, select, button {
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 1rem;
        width: 100%;
        box-sizing: border-box;
    }
    button {
        background-color: #007BFF;
        color: white;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    button:hover {
        background-color: #0056b3;
    }
    .btn-back {
        display: inline-block;
        padding: 10px 15px;
        font-size: 1rem;
        color: #fff;
        background-color: #6c757d;
        text-decoration: none;
        border-radius: 5px;
        text-align: center;
    }
    .btn-back:hover {
        background-color: #5a6268;
    }
    </style>
</head>
<body>
<div class="container">
    <h1>Editar Tarea</h1>
    <a href="{{ route('tasks.index') }}" class="btn btn-back" style="margin-bottom: 15px;">Atrás</a>
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="title">Título</label>
        <input type="text" id="title" name="title" value="{{ $task->title }}" required>

        <label for="description">Descripción</label>
        <textarea id="description" name="description" rows="4" required>{{ $task->description }}</textarea>

        <label for="status">Estado</label>
        <select id="status" name="status">
            <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pendiente</option>
            <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>En Progreso</option>
            <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completada</option>
        </select>

        <label for="due_date">Fecha de Cumplimiento</label>
        <input type="date" id="due_date" name="due_date" value="{{ $task->due_date }}" required>

        <button type="submit">Actualizar Tarea</button>
    </form>
    <a href="{{ url('/') }}" class="btn btn-back" style="margin-top: 30px;">Volver al Menú Principal</a>
</div>
</body>
</html>