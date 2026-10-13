# Plano de Estudos — Entrevista Digiliza (Full Stack Jr.)

> **Vaga:** Desenvolvedor Full Stack Jr. @ Digiliza (Rio do Sul/SC)
> **Stack do produto que vou pegar (Digiliza Tarefas):** Laravel (backend) + Vue.js (frontend)
> **Entrevista:** terça 13/10 · **Estudo de verdade:** dom 11/10 e seg 12/10 (2 dias cheios)
> **Meta:** não virar especialista — ter *modelo mental* das tecnologias e saber explicar o que o código faz.

---

## 0. Diagnóstico (ponto de partida)

| Área | Nível atual | Esforço |
|---|---|---|
| **Laravel** | Já construí apps reais (grao-fino-admin, pw2): migrations, Form Requests, testes, Vite+Tailwind | 🟡 Lapidar / entender |
| **PHP / REST / Docker / OAuth** | Sólido pra júnior | 🟢 Já tenho |
| **Vue.js** | Zero | 🔴 Prioridade #1 |
| **React** | Pouco (ajuda a mapear conceitos pro Vue) | — |
| **Integração Laravel↔Vue (Inertia/Sanctum)** | Zero | 🔴 Prioridade #2 |

**Regra de ouro:** só tenho 2 dias. Eu já sei montar backend. O jogo é (1) aprender Vue e (2) conectar os dois. Não gastar tempo reaprendendo o que já domino.

---

## 1. Sobre a empresa (pra citar na entrevista)

- SaaS de **gestão operacional e atendimento**, forte no **mercado contábil** (escritórios de contabilidade).
- Produtos: **Digiliza Tarefas** (gestão de tarefas/prazos/obrigações), **Digiliza Chat** (omnichannel — WhatsApp/e-mail/Telegram/Instagram, tem mobile em React), **Liza IA**.
- Infra **AWS**, foco em **LGPD, criptografia e controle de acesso por papéis (RBAC)**.
- Eu vou pro **Digiliza Tarefas** (Laravel + Vue, sem React).
- Domínio = CRUD com permissões, workflows de status, prazos/recorrência, dashboards. **Meu projeto de estudo vai imitar isso de propósito.**

---

## 2. React → Vue: mapa mental (ler ANTES do tutorial de Vue)

Vindo de React, Vue 3 com `<script setup>` fica fácil. Equivalências:

| React | Vue 3 (Composition API) |
|---|---|
| `useState` | `ref()` / `reactive()` |
| `const [x,setX]=useState()` → `setX(v)` | `const x = ref(0)` → `x.value = v` (no template só `x`) |
| `useMemo` | `computed()` |
| `useEffect` | `watch()` / `watchEffect()` / `onMounted()` |
| JSX `{cond && ...}` | `v-if` / `v-else` |
| `.map(...)` em JSX | `v-for="item in lista" :key="item.id"` |
| `onClick={fn}` | `@click="fn"` |
| `value={x} onChange=...` | `v-model="x"` (two-way, **grande diferença**) |
| props + callbacks | `defineProps()` + `defineEmits()` |
| `useContext` / Redux / Zustand | `provide/inject` / **Pinia** |
| componente `.jsx` | **Single File Component `.vue`** (`<template>`/`<script setup>`/`<style>`) |

**Diferenças que mais pegam quem vem do React:**
1. `ref` precisa de `.value` no JS (mas não no template). `reactive` não.
2. `v-model` faz two-way binding automático — não existe "controlled component manual".
3. Template é HTML com diretivas (`v-if`, `v-for`, `:prop`, `@event`), não JSX.
4. Reatividade é automática/mutável (muda `x.value` direto) — em React é imutável (`setX`).
5. Um `.vue` junta template + lógica + estilo (com `scoped`) no mesmo arquivo.

---

## 3. Cronograma (2 dias) — compacto e priorizado

### 📅 DIA 1 — Domingo 11/10: Vue do zero + a cola Laravel↔Vue

Esse é o dia pesado. O objetivo é sair daqui entendendo Vue e sabendo como ele conversa com Laravel.

**Manhã (3–4h) — Vue fundamentos**
- [ ] Ler a seção "Essentials" do guia oficial: https://vuejs.org/guide/introduction.html
- [ ] Fazer o tutorial interativo oficial inteiro: https://vuejs.org/tutorial/ (usa `<script setup>` — o moderno)
- [ ] Focar em: `ref`/`reactive`, `computed`, template (`v-if`/`v-for`/`v-bind`/`v-on`), `v-model`, componentes, props/emits, `onMounted`.
- [ ] Ter a tabela React→Vue (seção 2) aberta do lado e ir marcando o que fez clique.

**Tarde (3–4h) — Laravel Bootcamp (Vue + Inertia) ← eixo central**
- [ ] Fazer o **Laravel Bootcamp** escolhendo o stack **Vue + Inertia**: https://bootcamp.laravel.com
  - Constrói o app "Chirper" completo (auth, CRUD, autorização, relacionamentos). É *exatamente* o padrão que a Digiliza provavelmente usa, e revisa Laravel + ensina a integração de uma vez só.
- [ ] Entender o fluxo Inertia: controller Laravel faz `Inertia::render('Pagina', [dados])` → o componente Vue recebe como props. Sem API REST separada, sem axios na mão.
- [ ] Saber que existe a alternativa SPA + **Laravel Sanctum** (API separada) — só pra citar a diferença na entrevista.

**Noite (1–1,5h, se tiver pique) — Refresh Laravel no meu código**
- [ ] Abrir `grao-fino-admin` e navegar: uma rota, um Controller, um Model, uma migration. Pergunta-teste: *"consigo explicar isso linha a linha?"*
- [ ] Olhar o conceito de **Policies/Gates** (autorização por papel/RBAC) — importante pra Digiliza: https://laravel.com/docs/authorization
- [ ] Se estiver cansado, pular — o Bootcamp já cobriu muito disso. Dormir bem vale mais.

---

### 📅 DIA 2 — Segunda 12/10: construir o projeto + saber explicar tudo

**Manhã (3–4h) — Projeto "Mini Tarefas": backend + scaffold**
- [ ] Scaffold com Breeze (stack Vue+Inertia) — comandos na seção 4.
- [ ] Model `Task` + migration (title, description, deadline, status, user_id).
- [ ] Relacionamento User↔Task + seeder com dados fake.
- [ ] Resource Controller + Form Request de validação.
- [ ] Policy: só o dono (ou admin) edita/exclui a tarefa.

**Tarde (3h) — Frontend Vue + fechar**
- [ ] Lista de tarefas + formulário criar/editar (`v-model`).
- [ ] Filtro por status + badge de "prazo vencido" (`computed`).
- [ ] Papéis: membro vê as suas, admin vê todas (exercita RBAC).
- [ ] Deixar rodando e **commitar no GitHub** (vira portfólio pra mostrar).

**Noite (1,5–2h) — Saber explicar TUDO**
- [ ] Percorrer o projeto me testando: *"por que esse arquivo existe? como o dado vai do banco até a tela?"*
- [ ] Decorar o **fluxo de uma request**: rota → controller → model/Eloquent → Inertia → componente Vue → render.
- [ ] Ler a seção 5 (perguntas de entrevista).

> ⚠️ **Se o tempo apertar:** o projeto é o "nice to have"; o essencial é entender Vue e o fluxo Inertia do Bootcamp. Prefira um projeto pequeno e 100% compreendido a um grande que eu não saiba explicar.

---

### 📅 DIA 3 — Terça 13/10: DIA DA ENTREVISTA (só revisão leve)

- [ ] Reler a tabela React→Vue (seção 2) e o fluxo de request.
- [ ] Reler a seção 5 (perguntas + narrativa + perguntas pra fazer a eles).
- [ ] Abrir o projeto pra conseguir falar dele / demonstrar se pedirem.
- [ ] **Nada de conteúdo novo.** Chegar descansado > chegar com mais um tópico na cabeça.

---

## 4. Projeto: "Mini Digiliza Tarefas"

Um clone minúsculo do produto deles — mostra que entendi o domínio.

**Escopo mínimo (MVP):**
- Auth (vem pronto do Breeze).
- `Task`: título, descrição, prazo (deadline), status (`pendente` / `em_andamento` / `concluida`), responsável (user).
- CRUD completo de tarefas.
- Filtro por status + destaque pra prazo vencido.
- Papéis: `membro` (vê/edita as suas) vs `admin` (vê todas) → **Policy**.

**Se sobrar tempo (bônus):**
- Dashboard com contagem por status (`computed` no front ou agregação no back).
- Um teste de feature (`php artisan test`) — impressiona num júnior.

**Comandos pra começar:**
```bash
laravel new mini-tarefas   # ou: composer create-project laravel/laravel mini-tarefas
cd mini-tarefas
composer require laravel/breeze --dev
php artisan breeze:install   # escolher: Vue with Inertia
npm install && npm run dev
php artisan migrate
```

---

## 5. Preparação pra entrevista

**Perguntas técnicas prováveis (júnior) — ter resposta pronta:**
- O que é o Eloquent? Diferença entre `hasMany` e `belongsTo`?
- Como funciona uma migration? Por que não editar o banco na mão?
- O que é um Form Request? Onde valido dados no Laravel?
- No Vue: diferença entre `ref` e `reactive`? O que é `computed`? E `v-model`?
- Como o dado sai do backend Laravel e chega no componente Vue? (fluxo Inertia)
- Como eu restrinjo uma ação a um tipo de usuário? (Policy/Gate → RBAC)

**Minha narrativa (honesta e forte):**
- "Minha base é backend — APIs limpas, REST, Docker. Já construí apps Laravel completos."
- "Vue é novo pra mim, mas vindo de React/Blade a transição foi rápida; nesses dias montei um app Laravel+Vue+Inertia pra pegar o fluxo." (mostrar o projeto!)
- Sobre IA: "Uso IA no dia a dia, mas faço questão de **entender e revisar** cada parte — sei explicar o que o código faz, não só aceitar sugestão." ← **esse é o diferencial de verdade.**

**Perguntas boas pra EU fazer a eles:**
- "No Digiliza Tarefas, vocês usam Inertia ou uma SPA separada com API + Sanctum?"
- "Como é o fluxo de trabalho com IA no time? Vocês têm processo de revisão do código gerado?"
- "O sistema é multi-tenant (vários escritórios)? Como lidam com isolamento de dados / LGPD?"
- "Que parte do produto um júnior costuma pegar primeiro?"

---

## 6. Links de referência

- Vue 3 guia + tutorial: https://vuejs.org/guide/introduction.html · https://vuejs.org/tutorial/
- Laravel Bootcamp (Vue+Inertia): https://bootcamp.laravel.com
- Laravel docs: https://laravel.com/docs
- Inertia.js: https://inertiajs.com
- Laravel Sanctum (alternativa SPA/API): https://laravel.com/docs/sanctum
- Pinia (estado Vue): https://pinia.vuejs.org
- Laracasts (vídeos, muito do intro é grátis): https://laracasts.com
