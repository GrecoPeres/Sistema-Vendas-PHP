<?php

?>

<style>
    .shortcut-card {
        width: 190px;
        height: 150px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        transition: transform 0.3s ease;
        font-family: Arial, sans-serif;
        justify-content: center;
        align-items: center;
    }

    .shortcut-card:hover {
        transform: translateY(-5px);
    }

    .shortcut-card-content {
        text-align: center;
    }

    .shortcut-card-content h2 {
        margin-bottom: 10px;
        color: #333;
    }

    .shortcut-card-content p {
        color: #666;
    }

    .shortcut-container {
        display: grid;
        grid-template-columns: repeat(5, 1fr); 
        gap: 5rem; 
        padding: 20px;
        background-color: #f0f0f0;
    }

    a {
        text-decoration: none;
    }
</style>


<div class="shortcut-container">
    <a href="categories" class="shortcut-card">
        <div class="shortcut-card-content">
            <h2>Categorias</h2>
            <i style="font-size: 24px" class="fa fa-th"></i>
        </div>
    </a>

    <a href="customers" class="shortcut-card">
        <div class="shortcut-card-content">
            <h2>Clientes</h2>
            <i style="font-size: 24px" class="fa fa-users"></i>
        </div>
    </a>

    <a href="create-sale" class="shortcut-card">
        <div class="shortcut-card-content">
            <h2>Nova venda</h2>
            <i style="font-size: 24px" class="fa fa-money"></i>
        </div>
    </a>
    
    <a href="products" class="shortcut-card">
        <div class="shortcut-card-content">
            <h2>Produtos</h2>
            <i style="font-size: 24px" class="fa fa-cubes"></i>
        </div>
    </a>
    <a href="users" class="shortcut-card">
        <div class="shortcut-card-content">
            <h2>Usuários</h2>
            <i style="font-size: 24px" class="fa fa-id-badge"></i>
        </div>
    </a>

</div>
