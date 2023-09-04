<script>
import Results from '@/Pages/Results.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

export default {
    name: 'Budget',
    components: {
        Results,
        Head
    },
    data() {
        return {
            budget: {
                value: '',
                total: 0,
                vehicleType: "",
                fees: {
                    basic: 0,
                    special: 0,
                    association: 0,
                    storage: 0
                }
            }
        }
    },
    methods: {
        calculate() {

            if (this.budget.value !== '') {
                axios.post(route('calculate'), {
                    budget: this.budget.value,
                    vehicleType: this.budget.vehicleType
                }).then((response) => {
                    this.budget.value = response.data.result.budget;
                    this.budget.vehicleType = response.data.result.vehicleType;
                    this.budget.total = response.data.result.total;
                    this.budget.fees.basic = response.data.result.fees.basic;
                    this.budget.fees.special = response.data.result.fees.special;
                    this.budget.fees.association = response.data.result.fees.association;
                    this.budget.fees.storage = response.data.result.fees.storage;
                })
            }
        }
    }
}
</script>

<template>
    <Head title="Progi Bid Calculation" />
    <div class=" bg-gray-100 min-h-screen ">
        <div class="block p-10 rounded-lg shadow-2xl bg-white max-w-fit m-4">
            <div class="">
                <form @submit.prevent="submit">
                    <label for="budget">Budget</label>
                    <input id="budget" type="budget" class="mt-1 block w-full shadow-lg hover:border-2xl"
                        v-model="budget.value" required autofocus @keyup="calculate" />

                    <div class="my-3">
                        <label for="vehicleType">Vehicule Type</label>
                        <select class="form-control" name="vehicleType" id="vehicleType" v-model="budget.vehicleType">
                            <option value="0">Select Vehicule</option>
                            <option value="Common">Common</option>
                            <option value="Luxury ">Luxury </option>
                        </select>
                    </div>
                </form>
            </div>
            <br>
            <Results :budget="budget" />
        </div>
    </div>
</template>
