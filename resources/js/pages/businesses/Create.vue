<script setup lang="ts">
import { type BreadcrumbItem } from '@/types';
import { Head, useForm } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    }
    ,{
        title: 'Businesses',
        href: '/businesses',
    },{
        title: 'New',
        href: '/businesses/create',
    },
];

const form = useForm({
    type: '',
    name: '',
    address: '',
    country: '',
    vat_number: '',
});

const submit = () => {
    form.post(route('businesses.store'));
};


</script>

<template>

    <Head title="Add Business" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="w-full max-w-full sm:max-w-2xl mt-5 md:max-w-3xl lg:max-w-4xl xl:max-w-5xl mx-auto p-6 bg-white rounded shadow">
            <p class="mb-4 text-sm text-gray-600">
                NOTE: This will create JUST the business, not its contacts...
            </p>
            <form @submit.prevent="submit" class="space-y-6">
                <!-- Business Name -->
                <div>
                <label for="name" class="block text-sm font-medium text-gray-700">
                    Business Name
                </label>
                <input
                    id="name"
                    type="text"
                    required
                    autofocus
                    :tabindex="1"
                    v-model="form.name"
                    placeholder="Business Name"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                />
                </div>

                <!-- Business Type -->
                <div>
                <label for="type" class="block text-sm font-medium text-gray-700">
                    Business Type
                </label>
                <select
                    id="type"
                    required
                    :tabindex="2"
                    v-model="form.type"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                >
                    <option value="">Select</option>
                    <option value="distributor">Distributor</option>
                    <option value="supplier">Supplier</option>
                </select>
                </div>

                <!-- Address -->
                <div>
                <label for="address" class="block text-sm font-medium text-gray-700">
                    Address
                </label>
                <textarea
                    id="address"
                    required
                    :tabindex="3"
                    v-model="form.address"
                    placeholder="Business Address"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                ></textarea>
                </div>

                <!-- Country -->
                <div>
                <label for="country" class="block text-sm font-medium text-gray-700">
                    Country
                </label>
                <p class="text-xs text-gray-500 mb-1">
                    This should be a select with only valid options...
                </p>
                <input
                    id="country"
                    type="text"
                    required
                    :tabindex="4"
                    v-model="form.country"
                    placeholder="Country"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                />
                </div>

                <!-- VAT Number -->
                <div>
                <label for="vat_number" class="block text-sm font-medium text-gray-700">
                    VAT Number
                </label>
                <input
                    id="vat_number"
                    type="text"
                    required
                    :tabindex="5"
                    v-model="form.vat_number"
                    placeholder="VAT Number"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                />
                </div>

                <!-- Submit Button -->
                <div>
                <button
                    type="submit"
                    class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                >
                    Save
                </button>
                </div>
            </form>
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

</style>
