<script>
export default {
    name: "LessonsIndex"
}
</script>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import { Inertia } from '@inertiajs/inertia';


defineProps({
    lessons: {
        type: Object,
        required: true
    }
})


const deleteLesson = (id) => {
    if (confirm('Está seguro de eliminar esta lección?')) {
        Inertia.delete(route('lessons.destroy', id))
    }
}

</script>

<template>
    <AppLayout title="Lessons">
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">Lessons</h1>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="flex justify-between" v-if="$page.props.user.permissions.includes('create lessons')">
                        <Link :href="route('lessons.create')"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded"
                            v-if="$page.props.user.permissions.includes('create lessons')">
                        Create lesson
                        </Link>
                    </div>

                    <div class="mt-4">
                        <ul role="list" class="divide-y divide-gray-100">

                            <li class="flex justify-between gap-x-6 py-5" v-for="lesson in lessons.data"
                                :key="lesson.id">

                                <div class="flex min-w-0 gap-x-4">
                                    <div class="min-w-0 flex-auto">
                                        <p class="text-md font-semibold text-gray-900">{{ lesson.name }}</p>
                                    </div>
                                </div>
                                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                    <p class="text-md leading-6 text-gray-900">
                                        <Link class="text-indigo-600 py-2 px-4"
                                            :href="route('lessons.edit', lesson.id)"
                                            v-if="$page.props.user.permissions.includes('update lessons')">Edit
                                        </Link>
                                        <Link class="text-red-600 py-2 px-4"
                                            :href="route('lessons.destroy', lesson.id)"
                                            @click="deleteLesson(lesson.id)"
                                            v-if="$page.props.user.permissions.includes('delete lessons')">Delete
                                        </Link>
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="flex justify-between mt-2"
                        v-if="$page.props.user.permissions.includes('create lessons')">
                        <Link v-if="$page.props.lessons.current_page > 1" :href="lessons.prev_page_url"
                            class="py-2 px-4 rounded">
                        << PREVIOUS </Link>
                            <div v-else></div>
                            <Link v-if="$page.props.lessons.current_page < $page.props.lessons.last_page"
                                :href="lessons.next_page_url" class="py-2 px-4 rounded">
                            NEXT >>

                            </Link>

                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>