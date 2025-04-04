<script setup lang="ts">
import { type BreadcrumbItem } from '@/types';
import { Business } from '@/types/business';
import { Filters } from '@/types/filters';
import { Head } from '@inertiajs/vue3';
import BusinessCard from './components/BusinessCard.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];

defineProps<{
    businesses: Array<Business>;
    filters: Array<Filters>;
}>();
</script>

<template>
    <Head title="Dashboard" />

    <!-- <AppLayout :breadcrumbs="breadcrumbs"> -->
    <h1>Businesses</h1>
    <label for="businessType">Filter by Type:</label>
    <select id="businessType" class="custom-select">
        <option value="all">All</option>
        <option value="distributor">Distributor</option>
        <option value="supplier">Supplier Only</option>
    </select>

    <BusinessCard v-for="business in businesses" :business="business" :key="business.id" />
    <!-- </AppLayout> -->
</template>

<style scoped>
h1 {
    font-size: 2.5em;
    font-weight: 600;
}

.custom-select {
    display: inline-block;
    width: 100%;
    max-width: 300px;
    padding: 0.375rem 1.75rem 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 4 5' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M2 0L0 2h4L2 0zM2 5L0 3h4L2 5z' fill='%23666'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 0.75rem center;
    background-size: 8px 10px;
    border: 1px solid #ced4da;
    border-radius: 0.375rem;
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    transition:
        border-color 0.15s ease-in-out,
        box-shadow 0.15s ease-in-out;

    margin-bottom: 1em;
}

.custom-select:focus {
    border-color: #86b7fe;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
}
</style>
