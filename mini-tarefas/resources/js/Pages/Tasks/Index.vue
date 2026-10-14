<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import ItemTask from '@/Components/Tasks/ItemTask.vue';

defineProps({
  tasks: Array,
});
</script>

<template>
  <Head title="Tarefas" />

  <AuthenticatedLayout>
    <ul class="p-4 flex flex-wrap align-center gap-4">
      <li class="w-[calc(50%-0.5rem)] flex align-center justify-center" :style="itemStyle" v-for="task in tasks" :key="task.id">
        <ItemTask :task="task" />
      </li>
    </ul>
  </AuthenticatedLayout>
</template>