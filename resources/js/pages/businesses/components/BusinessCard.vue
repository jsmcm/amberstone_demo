<script setup lang="ts">
import { Business } from '@/types/business';
import { computed } from 'vue';

const props = defineProps<{
    business: Business;
}>();

const businessAddress = computed(() => {
    return props.business.address.replace('\n', '<br />');
});
</script>

<template>
    <div class="card">
        <div class="card-title">
            {{ business.name }} ({{ business.id }})
            <span
                class="muted"
                :class="{
                    supplier: business.type == 'supplier',
                    distributor: business.type == 'distributor',
                }"
                >{{ business.type }}</span
            >
        </div>

        <div class="card-body">
            <p>
                <strong>Address: </strong><br />
                <span v-html="businessAddress"></span>
            </p>

            <p>
                <strong>Country: </strong><br />
                {{ business.country }}
            </p>

            <p>
                <strong>VAT Number: </strong><br />
                {{ business.vat_number }}
            </p>
        </div>
    </div>
</template>

<style scoped>
.card {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 12px;
    padding: 16px 20px;
    margin-bottom: 20px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    transition: box-shadow 0.2s ease-in-out;
}

.card:hover {
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.card-title {
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 12px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.card-title .muted {
    font-size: 0.875rem;
    color: #999;
    font-weight: normal;
}

.card-title .supplier {
    color: #df6558;
}

.card-title .distributor {
    color: #449b7b;
}

.card-body p {
    margin: 10px 0;
    line-height: 1.4;
}
</style>
