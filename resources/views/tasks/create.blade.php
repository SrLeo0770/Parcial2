<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Task</title>

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
        width: 100%;
        box-sizing: border-box;
    }
    .btn-back:hover {
        background-color: #5a6268;
    }
    </style>
</head>
<body>
    <div class="container">
        <h1>Registrar Nueva Tarea</h1>

        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <label for="title">Título</label>
            <input type="text" id="title" name="title" required>

            <label for="description">Descripción</label>
            <textarea id="description" name="description" rows="4" required></textarea>

            <label for="status">Estado</label>
            <select id="status" name="status">
                <option value="pending">Pendiente</option>
                <option value="in_progress">En Progreso</option>
                <option value="completed">Completada</option>
            </select>

            <label for="due_date">Fecha de Cumplimiento</label>
            <input type="date" id="due_date" name="due_date" required>

            <button type="submit">Registrar Tarea</button>
        </form>
    </div>
</body>
</html>