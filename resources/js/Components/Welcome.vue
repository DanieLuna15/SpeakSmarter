<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
</script>

<template>
    <div>
        <h1>Hello World</h1>
        <button v-if="$page.props.user.permissions.includes('create roles')">Create Roles</button>
        <button v-if="$page.props.user.permissions.includes('create lessons')">Create new Lesson</button>
        <!-- {{ $page.props }} -->
    </div>
</template>

<style>
button{
    background-color: green;
    color: white;
    padding: 20px;
    margin: 5px;
}
</style>
