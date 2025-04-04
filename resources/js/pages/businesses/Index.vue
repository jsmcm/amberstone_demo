<script setup lang="ts">
import { type BreadcrumbItem } from '@/types';
import { Business } from '@/types/business';
import { Filters } from '@/types/filters';
import { Head, Link } from '@inertiajs/vue3';
import BusinessCard from './components/BusinessCard.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { ref, onMounted } from "vue";
import axios from "axios";
import { usePage } from '@inertiajs/vue3';


const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },{
        title: 'Businesses',
        href: '/businesses',
    },
];

const props = defineProps<{
    businesses: Array<Business>;
    filters: Array<Filters>;
}>();

// Instead of redirecting back to a laravel controller
// we'll use axios here as per the requirements
function filterByType() {

    let params = { };
    if (businessType.value !== "all") {
        params = { type: businessType.value };
    }
    
    axios.get(route("businesses"),{
        headers: {
            Accept: "application/json",
        },
        params
    })
    .then(data => {
        localBusinesses.value = data.data.businesses;
    })
    .catch(error => console.error(error));
}

const businessType = ref("all");

const localBusinesses = ref<Business[]>();

onMounted(() => {
    localBusinesses.value = props.businesses;
});

</script>

<template>

    <Head title="Businesses" />
    <AppLayout :breadcrumbs="breadcrumbs">

        <div class="container">

            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-2xl font-bold mb-2">Businesses</h1>
                    <div class="flex items-center">
                    <label for="businessType" class="mr-2">Filter by Type:</label>
                    <select
                        id="businessType"
                        class="border border-gray-300 rounded p-1"
                        v-model="businessType"
                        @change="filterByType"
                    >
                        <option value="all">All</option>
                        <option value="distributor">Distributor</option>
                        <option value="supplier">Supplier Only</option>
                    </select>
                    </div>
                </div>
                <div v-if="usePage().props.auth.user.role == 'System Administrator'">
                    <Link
                    href="/businesses/create"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
                    >
                    + Add Business
                    </Link>
                </div>
            </div>

            <BusinessCard v-for="business in localBusinesses" :business="business" :key="business.id" />
        </div>
    </AppLayout>
</template>

<style scoped>
h1 {
    font-size: 2.5em;
    font-weight: 600;
}

.container {
    padding: 0.5em;
}

label {
    margin-right: 20px;
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
