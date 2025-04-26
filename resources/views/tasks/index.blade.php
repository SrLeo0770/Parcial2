<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Task List</title>

    <style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #e0f7fa;
        color: #333;
    }
    .container {
        max-width: 800px;
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
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    table th, table td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    table th {
        background-color: #007BFF;
        color: white;
    }
    table tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    .btn {
        display: inline-block;
        padding: 10px 15px;
        font-size: 14px;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        margin-right: 5px;
    }
    .btn-create {
        background-color: #007BFF;
        margin-bottom: 15px;
    }
    .btn-create:hover {
        background-color: #0056b3;
    }
    .btn-edit {
        background-color: #28a745;
    }
    .btn-edit:hover {
        background-color: #218838;
    }
    .btn-delete {
        background-color: #dc3545;
    }
    .btn-delete:hover {
        background-color: #c82333;
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
        <h1>Lista de Tareas</h1>
        <a href="{{ route('tasks.create') }}" class="btn btn-create">Crear Nueva Tarea</a>
        <a href="{{ url('/') }}" class="btn btn-back" style="float: right; margin-bottom: 15px;">Volver al Menú Principal</a>

        <form method="GET" action="{{ route('tasks.index') }}" style="margin-bottom: 20px;">
            <label for="sort" style="margin-right: 10px;">Ordenar por:</label>
            <select name="sort" id="sort" onchange="this.form.submit()" style="padding: 5px; border-radius: 5px;">
                <option value="title" {{ request('sort') == 'title' ? 'selected' : '' }}>Nombre</option>
                <option value="status" {{ request('sort') == 'status' ? 'selected' : '' }}>Estado</option>
                <option value="due_date" {{ request('sort') == 'due_date' ? 'selected' : '' }}>Fecha de Cumplimiento</option>
            </select>
        </form>

        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Fecha de Cumplimiento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>
                            @if ($task->status == 'pending')
                                Pendiente
                            @elseif ($task->status == 'in_progress')
                                En Progreso
                            @elseif ($task->status == 'completed')
                                Completada
                            @endif
                        </td>
                        <td>{{ $task->due_date }}</td>
                        <td>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-edit">Editar</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">Borrar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>