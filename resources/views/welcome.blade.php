<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management</title>
    <style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #e0f7fa;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .menu-container {
        background: #ffffff;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        text-align: center;
        max-width: 400px;
        width: 100%;
    }
    .menu-container h1 {
        font-size: 2rem;
        color: #007BFF;
        margin-bottom: 20px;
    }
    .menu-container .menu-buttons {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }
    .menu-container a {
        text-decoration: none;
        color: white;
        background-color: #007BFF;
        padding: 15px;
        border-radius: 8px;
        font-size: 1.2rem;
        transition: background-color 0.3s;
    }
    .menu-container a:hover {
        background-color: #0056b3;
    }
    </style>
</head>
<body>
<div class="menu-container">
    <h1>Gestión de Tareas</h1>
    <div class="menu-buttons">
        <a href="{{ route('tasks.index') }}">Ver Tareas</a>
        <a href="{{ route('tasks.create') }}">Crear Nueva Tarea</a>
    </div>
</div>
</body>
</html>
