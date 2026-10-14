# Contexto — Projeto Mini Tarefas

## Quem sou
Gabriel Tadeu (GitHub: bLzera), de Rio do Sul/SC. Dev **focado em backend**: Laravel/PHP, C#, Ruby, REST APIs, Docker, OAuth 2.0. Uso Claude Code pra desenvolver, mas gosto de *entender* o código, não só aceitar sugestão.

## Situação atual
- **Passei na entrevista** pra Full Stack Jr. na **Digiliza** (Rio do Sul/SC). Começo na semana de **19/10/2026**.
- Este projeto ("Mini Tarefas") agora é **só por gosto/contato com a stack**, sem pressão de estudo. Nada de aprofundar em conceito complexo; o objetivo é ir construindo e entendendo o básico.
- Stack do projeto continua **Laravel + Vue 3 + Inertia (Breeze)**, mesmo que o trabalho não use Inertia (ver abaixo).

## O projeto Mini Tarefas
App em `mini-tarefas/`: CRUD de tarefas com status/prazo e papéis admin/membro (imitando o Digiliza Tarefas). Já tem migrations, `TaskPolicy`, seeders, `TaskController` (resource) e páginas Vue em `Pages/Tasks/`.
- Decisão: **remover o Dashboard e a Welcome** do Breeze. `/` redireciona pra `/tasks` (o middleware `auth` manda pro login quem não está logado). Ficam só login/register/profile + telas de tasks.

## Como é a stack real na Digiliza (o que me contaram)
- **Digiliza Tarefas**: Laravel. Front misturado: algumas telas em **Blade**, outras em "HTML solto". **Não usam Inertia.** Plano da empresa é extrair o backend pra **APIs** e separar o front.
- **Digiliza Chat**: todo via **API**, backend em **Ruby**.
- O time do Tarefas é responsável pelas **integrações Tarefas ↔ Chat**, então vou precisar de algum contato com **Ruby** e com consumo/exposição de APIs.

## Como me ajudar
- Tom leve: explicar o *porquê* quando for útil, sem transformar em aula.
- Quando fizer sentido, apontar como algo do projeto se traduziria pro mundo real do trabalho (API REST separada, Blade, integração com serviço Ruby).

## Histórico
- `PLANO_ESTUDOS.md` e os guias na raiz são do período de preparação pra entrevista (10–13/10) — só referência.
