# Rotina Fácil

Sistema web para organização da rotina pessoal, permitindo cadastrar categorias e tarefas, acompanhar pendências e visualizar um resumo no dashboard.

## Objetivo

O projeto foi desenvolvido para ajudar o usuário a organizar atividades do dia a dia de forma simples, visual e prática.

## Funcionalidades

- Cadastro e login de usuário
- Dashboard com resumo das tarefas
- Cadastro de categorias
- Cadastro de tarefas
- Filtros por categoria, prioridade e situação
- Marcação de tarefa como concluída
- Foto de perfil
- Interface personalizada com identidade visual própria

## Tecnologias utilizadas

- PHP 8.3
- Laravel 13
- Livewire
- Tailwind CSS
- Flux UI
- PostgreSQL (Neon)

## Como executar localmente

### Requisitos
- PHP
- Composer
- Node.js
- npm
- PostgreSQL configurado no Neon

### Passos
```bash
git clone URL_DO_REPOSITORIO
cd rotina-facil
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan storage:link
