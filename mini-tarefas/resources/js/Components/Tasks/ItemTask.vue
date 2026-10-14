<script setup>
defineProps({
  task: { type: Object, required: true}
})

const statusStyle = {
  pending: 'bg-yellow-100',
  in_progress: 'bg-blue-100',
  done: 'bg-green-100',
}

const statusLabel = {
  pending: 'Pendente',
  in_progress: 'Ativa',
  done: 'Finalizada',
};
</script>

<template>
  <div class="flex w-full flex-col gap-2 rounded-lg bg-white p-4 shadow hover:shadow-md cursor-pointer transition-all duration-300">
    <div class="flex items-start justify-between gap-2">
      <h4 class="text-lg font-semibold text-gray-800">{{ task.title }}</h4>
      <span class="rounded-full px-2 py-0.5 text-xs font-medium text-black-800" :class="statusStyle[task.status]">{{ statusLabel[task.status] }}</span>
    </div>    

    <span class="text-sm text-gray-600">{{ task.description }}</span>    

    <div class="flex center justify-between border-t pt-2 text-xs text-gray-500">
      <span>Criada por {{ task.creator.name }}</span>
      <span>Responsável {{ task.user.name }}</span>
    </div>
  </div>
</template>